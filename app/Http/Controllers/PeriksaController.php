<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\Poli;
// use App\Models\Antrian;
use App\Models\{Poli, Kunjungan, Antrian, Pasien, Dokter };
use DateTime;

class PeriksaController extends Controller
{
    public function index()
    {
        $polis = Poli::get();
        // dd($antrian['Poli Umum']['sisaAntrian']);
        
        return view('periksa.index', [
            'polis' => $polis,
        ]);
    }

    public function show(Poli $poli){
        
        // $antrian = $poli->antrians;

        $antrian = Antrian::where([['status', 'Belum dilayani'],['poli_id', $poli->id]])->get();

        // $dokter = Dokter::where('id', $antrian->dokter_id)->first();

        // $pasien = Pasien::where('id', $antrian->pasien_id)->first();
        
        // echo $antrian[0]->poli_id;
        // dd($antrian);

        // $pasien = Pasien::findId($poli->antrians->pasien_id);

        // dd($dokter);

        return view('periksa.show', ['poli'=>$poli, 'antrians'=>$antrian]);
    }

    // public function createStep1()
    // {
    //     return view('periksa.create.step1', [
    //         'polis' => Poli::get(),
    //         'dokters' => Dokter::get()
    //     ]);
    // }

    // public function step1(Request $request)
    // {
    //     // $attr = $request->all();
    //     // dd($attr);
    //     $attr['poli_id'] = request('poli');
    //     $attr['dokter_id'] = request('dokter_id');
    //     $attr['pasien_id'] = request('pasien_id');
    //     $attr['jenis_kunjungan'] = request('jenis_kunjungan');
    //     $attr['tindak_lanjut'] = request('tindak_lanjut');
    //     $attr['tgl_kunjungan'] = request('tgl_kunjungan');
    //     $attr['keluhan'] = request('keluhan');
    //     $attr['terapi'] = request('terapi');
    //     $attr['keterangan'] = request('keterangan');
    //     $attr['status'] = "Belum dilayani";

    //     $posted = auth()->user()->kunjungans()->create($attr);
    //     $kunjungan = Kunjungan::where('pasien_id', request('pasien_id'))->where('tgl_kunjungan', request('tgl_kunjungan'))->first();
    //     $id = $kunjungan->id;
    //     session()->flash('success', 'Informasi pasien berhasil ditambah');
    //     Cache::add('id', $kunjungan->id, now()->addHours(4));
    //     return redirect()->route('periksa.create.step2');
    //     //return view('kunjungan.create.step2',['id' => 2]);

    // }

    // public function createStep2()
    //  {
    //     return view('periksa.create.step2',['id' => Cache::get('id')]);
    //  }

    // public function step2(Request $request)
    // {
    //     $attr = $request->all();
    //     // dd($request->all());
    //     $attr['id'] = request('id');
    //     $attr['kesadaran'] = request('kesadaran');
    //     $attr['tekanan_darah'] = request('tekanan_darah');
    //     $attr['tb'] = request('tb');
    //     $attr['bb'] = request('bb');
    //     $attr['respiratory_rake'] = request('respiratory_rake');
    //     $attr['heart_rafe'] = request('heart_rafe');
    //     // dd($attr);

    //     Kunjungan::whereId($attr['id'])->update($attr);
    //     // $kunjungan->update($attr);
    //     // $kunjungan = Kunjungan::where('kunjungan_id',['id' => Cache::get('id')] )->first();
    //     session()->flash('success', 'Pemeriksaan fisik berhasil ditambah');
    //     return redirect('periksa/create/step3');
    //     // return view('kunjungan.create.step3');
    // }

    // public function createStep3()
    // {
    //     return view('periksa.create.step3',['id' => Cache::get('id')]);
    //     //return view('kunjungan.create.step3');
    // }

    // public function step3(Request $request, Kunjungan $kunjungan)
    // {
    //     // $attr = $request->all();
    //     $attr = $request->all();
    //     $attr['id'] = request('id');
    //     $attr['diagnosa_id'] = request('diagnosa_id');
    //     $attr['resep'] = request('resep');
    //     $attr['status'] = request('status');
    //     $attr['biaya'] = request('biaya');

    //     //dd($attr);
    //     // $kunjungan->update($attr);

    //     Kunjungan::whereId($attr['id'])->update($attr);
    //     session()->flash('success', 'Status pemeriksaan berhasil ditambah');
    //     return redirect('periksa');
    // }

    // public function periksa.pasien()
    // {
        
    // }


}
