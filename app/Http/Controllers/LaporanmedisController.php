<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PasienRequest;

class LaporanmedisController extends Controller
{
    public function laporanpasien()
    {
        return view('laporan.laporanpasien', [
            'pasiens' => Pasien::get()
        ]);
    }

    public  function  export () 
    { 
        return view('laporan.cetakpasien', [
            'pasiens' => Pasien::get()
        ]);
    }

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
