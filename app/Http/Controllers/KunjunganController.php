<?php

namespace App\Http\Controllers;

// use App\Http\Requests\{KunjunganStep1Request, KunjunganStep2Request, KunjunganStep3Request};

use App\Http\Requests\KunjunganStep1Request;
use App\Http\Requests\KunjunganStep2Request;
use App\Http\Requests\KunjunganStep3Request;
use App\Http\Requests\ObatPasienRequest;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\{Antrian, Kunjungan, Dokter, Poli, Diagnosa, KunjunganObat, Obat, ObatPasien};
use Illuminate\Support\Facades\Redirect;

class KunjunganController extends Controller
{
    public function index()
    {
        return view('kunjungan.index', [
            'kunjungans' => Kunjungan::get()
        ]);
    }

    public function createStep1(Antrian $antrian)
    {

        // dd($antrian->user);
        return view('kunjungan.create.step1', [
            'polis' => Poli::get(),
            // 'dokters' => Dokter::get(),
            'antrians' => $antrian,
        ]);
    }

    public function step1(KunjunganStep1Request $request )
    {
        // $attr = $request->all();
        // dd($attr);
        // $attr['poli_id'] = request('poli');
        // $attr['dokter_id'] = request('dokter_id');
        // $attr['pasien_id'] = request('pasien_id');
        // $attr['jenis_kunjungan'] = request('jenis_kunjungan');
        // $attr['tindak_lanjut'] = request('tindak_lanjut');
        // $attr['tgl_kunjungan'] = request('tgl_kunjungan');
        // $attr['keluhan'] = request('keluhan');
        // $attr['terapi'] = request('terapi');
        // $attr['keterangan'] = request('keterangan');
        // $attr['status'] = "Belum dilayani";

        // dd($request->all());

        $kunjungan = Kunjungan::create([
            'poli_id' => $request->poli,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jenis_kunjungan' => $request->jenis_kunjungan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'tgl_kunjungan' => $request->tgl_kunjungan,
            'keluhan'   => $request->keluhan,
            'terapi'    => $request->terapi,
            'keterangan'    => $request->keterangan
        ]);

        // dd($kunjungan->id);

        session(['id' => $kunjungan->id]);

        // $request->session()->put('kunjungan_id', $kunjungan->id);

        // $posted = auth()->user()->kunjungans()->create($attr);
        // $kunjungan = Kunjungan::where('pasien_id', $request->pasien_id)->where('tgl_kunjungan', $request->tgl_kunjungan)->first();
        // $id = $kunjungan->id;
        session()->flash('success', 'Informasi pasien berhasil ditambah');
        // Cache::add('id', $kunjungan->id, now()->addHours(4));
        return redirect()->route('kunjungan.create.step2');
        //return view('kunjungan.create.step2',['id' => 2]);

    }

    public function createStep2()
     { 
        // $id = $request
        return view('kunjungan.create.step2');
     }

    public function step2(KunjunganStep2Request $request)
    {
        // dd($request->all());
        // // dd($request->all());
        // $attr['id'] = request('id');
        // $attr['kesadaran'] = request('kesadaran');
        // $attr['tekanan_darah'] = request('tekanan_darah');
        // $attr['tb'] = request('tb');
        // $attr['bb'] = request('bb');
        // $attr['respiratory_rake'] = request('respiratory_rake');
        // $attr['heart_rafe'] = request('heart_rafe');
        // dd($attr);

        $kunjunganId = session('id');

        // dd($kunjunganId);

        Kunjungan::whereId($kunjunganId)->update([
            'kesadaran' => $request->kesadaran,
            'tekanan_darah' => $request->tekanan_darah,
            'tb'    => $request->tb,
            'bb'    => $request->bb,
            'respiratory_rake'  => $request->respiratory_rake,
            'heart_rafe' => $request->heart_rafe,
        ]);
        // $kunjungan->update($attr);
        // $kunjungan = Kunjungan::where('kunjungan_id',['id' => Cache::get('id')] )->first();
        session()->flash('success', 'Pemeriksaan fisik berhasil ditambah');
        return redirect('kunjungan/create/step3');
        // return view('kunjungan.create.step3');
    }

    public function createStep3()
    {   
        // dd(Cache::get('id'));
        $diagnosa = Diagnosa::all();
        $obat   = Obat::all();

        $idKunjungan = session('id');

        // dd($idKunjungan);

        $obatPasien = KunjunganObat::where('kunjungan_id',$idKunjungan)->get();

        // dd($obatPasien);
        return view('kunjungan.create.step3',['diagnosa' => $diagnosa, 'obats' => $obat, 'obatPasiens' => $obatPasien]);
        //return view('kunjungan.create.step3');
    }

    public function step3(KunjunganStep3Request $request)
    {
        // $attr = $request->all();

        $kunjunganId = session('id');
        Kunjungan::whereId($kunjunganId)->update([
            'diagnosa_id' => $request->diagnosa,
            'status'    => $request->status,
            'biaya'     => $request->biaya
        ]);

        //dd($attr);
        // $kunjungan->update($attr);

        $kunjungan = Kunjungan::whereId($kunjunganId)->first();
        Antrian::where([['pasien_id', $kunjungan->pasien_id],['tanggal',$kunjungan->tgl_kunjungan]])->update([
            'status' =>$request->status,
        ]);
        $idPoli = $kunjungan->poli_id;

        session()->forget('id');
        session()->flash('success', 'Status pemeriksaan berhasil ditambah');
        return redirect('periksa/'.$idPoli);
    }

    // public function createStep4()
    // {
    //     return view('kunjungan.create.step4');
    // }

    // public function step4(KunjunganStep4Request $request, Kunjungan $kunjungan)
    // {
    //     $attr = $request->all();
    //     dd($attr);
    //     $kunjungan->update($attr);

    //     session()->flash('success', 'Status pemeriksaan berhasil ditambah');
    //     return redirect('kunjungan');
    // }

    // public function destroy(Kunjungan $kunjungan)
    // {
    //     $kunjungan->delete();
    //     session()->flash('success', 'Data kunjungan berhasil dihapus');
    //     return redirect('kunjungan');
    // }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        session()->flash('success', 'Data obat berhasil dihapus');
        return redirect('');
    }


    public function tambahObat(ObatPasienRequest $request){

        // dd($request['obat']);

        $id = session('id');
        $request->validate([
            'obat' => 'required',
            'jumlah_obat' => 'required'
        ]);

        KunjunganObat::create([
            'kunjungan_id' => $id,
            'obat_id'   => $request->obat,
            'jumlah'    => $request->jumlah_obat,
        ]);

        return redirect('kunjungan/create/step3');
    }

    public function deleteObat(KunjunganObat $obatPasien){

        // dd($obatPasien);
        $obatPasien->delete();

        return redirect('kunjungan/create/step3');

    }

} 