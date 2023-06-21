<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PasienRequest;
use App\Models\Kunjungan;
use App\Models\KunjunganObat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LaporanmedisController extends Controller
{
    public function index(){
        $kunjungans = Kunjungan::all();

        // if(Auth::user()->role == 'pasien'){
        //     return $this->show(Auth::user());
        // }

        return view('laporan.laporanMedis.index', compact('kunjungans'));
    }

    public function show(User $user){

        $kunjungans = Kunjungan::where('pasien_id', $user->id)->get();

        // dd($kunjungans);

        return view('laporan.laporanMedis.show', ['kunjungans'=>$kunjungans, 'user'=>$user]);
    }

    public function cetakPdf(Kunjungan $kunjungan){

        $date = date('Y-m-d H:i:s');

        $obats = KunjunganObat::where('kunjungan_id', $kunjungan->id)->get();
        $biaya = number_format($kunjungan->biaya,2,',','.');
        // dd($users);
        // return view('laporan.pasien.cetak', compact('users'));
        $pdf = Pdf::loadView('laporan.laporanMedis.cetak', ['kunjungan'=>$kunjungan, 'obats'=>$obats, 'biaya'=>$biaya]);
        $pdf->setPaper('A4','portrait');

        return $pdf->download($date.'-Rekam Medis '.$kunjungan->user->name.'.pdf');

        // dd($kunjungan->user->name);

        // dd($obats->nama_obat);

        // return view('laporan.laporanMedis.cetak', ['kunjungan'=>$kunjungan, 'obats'=>$obats, 'biaya'=>$biaya]);
    }

    // public function laporanpasien()
    // {
    //     return view('laporan.laporanpasien', [
    //         'pasiens' => Pasien::get()
    //     ]);
    // }

    // public  function  export () 
    // { 
    //     return view('laporan.cetakpasien', [
    //         'pasiens' => Pasien::get()
    //     ]);
    // }

    // public function create()
    // {
    //     return view('pasien.create');
    // }

    // public function store(PasienRequest $request)
    // {
    //     $attr = $request->all();
    //     Pasien::create($attr);

    //     session()->flash('success', 'Data pasien berhasil ditambah');
    //     return redirect('laporan');
    // }

    // public function update(Pasien $pasien)
    // {
    //     return view('pasien.edit', [
    //         'pasien' => $pasien
    //     ]);
    // }

    // public function edit(Pasien $pasien, PasienRequest $request)
    // {
    //     $attr = $request->all();
    //     $pasien->update($attr);

    //     session()->flash('success', 'Data pasien berhasil diedit');
    //     return redirect('laporan');
    // }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        session()->flash('success', 'Data pasien berhasil dihapus');
        return redirect('laporan');
    }

    public function getPasien($id)
    {
        if (empty($id)) {
            return [];
        }

        $pasien = DB::table('pasiens')->where('nama_pasien', 'LIKE', "%$id%")->get();
        return $pasien;
    }
}
