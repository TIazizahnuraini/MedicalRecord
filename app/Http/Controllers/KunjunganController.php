<?php

namespace App\Http\Controllers;

// use App\Http\Requests\{KunjunganStep1Request, KunjunganStep2Request, KunjunganStep3Request};
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\{Kunjungan, Dokter, Poli, Diagnosa};

class KunjunganController extends Controller
{
    public function index()
    {
        return view('kunjungan.index', [
            'kunjungans' => Kunjungan::get()
        ]);
    }

    public function createStep1()
    {
        return view('kunjungan.create.step1', [
            'polis' => Poli::get(),
            'dokters' => Dokter::get()
        ]);
    }

    public function step1(Request $request)
    {
        // $attr = $request->all();
        // dd($attr);
        $attr['poli_id'] = request('poli');
        $attr['dokter_id'] = request('dokter_id');
        $attr['pasien_id'] = request('pasien_id');
        $attr['jenis_kunjungan'] = request('jenis_kunjungan');
        $attr['tindak_lanjut'] = request('tindak_lanjut');
        $attr['tgl_kunjungan'] = request('tgl_kunjungan');
        $attr['keluhan'] = request('keluhan');
        $attr['terapi'] = request('terapi');
        $attr['keterangan'] = request('keterangan');
        $attr['status'] = "Belum dilayani";

        $posted = auth()->user()->kunjungans()->create($attr);
        $kunjungan = Kunjungan::where('pasien_id', request('pasien_id'))->where('tgl_kunjungan', request('tgl_kunjungan'))->first();
        $id = $kunjungan->id;
        session()->flash('success', 'Informasi pasien berhasil ditambah');
        Cache::add('id', $kunjungan->id, now()->addHours(4));
        return redirect()->route('kunjungan.create.step2');
        //return view('kunjungan.create.step2',['id' => 2]);

    }

    public function createStep2()
     {
        return view('kunjungan.create.step2',['id' => Cache::get('id')]);
     }

    public function step2(Request $request)
    {
        $attr = $request->all();
        // dd($request->all());
        $attr['id'] = request('id');
        $attr['kesadaran'] = request('kesadaran');
        $attr['tekanan_darah'] = request('tekanan_darah');
        $attr['tb'] = request('tb');
        $attr['bb'] = request('bb');
        $attr['respiratory_rake'] = request('respiratory_rake');
        $attr['heart_rafe'] = request('heart_rafe');
        // dd($attr);

        Kunjungan::whereId($attr['id'])->update($attr);
        // $kunjungan->update($attr);
        // $kunjungan = Kunjungan::where('kunjungan_id',['id' => Cache::get('id')] )->first();
        session()->flash('success', 'Pemeriksaan fisik berhasil ditambah');
        return redirect('kunjungan/create/step3');
        // return view('kunjungan.create.step3');
    }

    public function createStep3()
    {
        return view('kunjungan.create.step3',['id' => Cache::get('id')]);
        //return view('kunjungan.create.step3');
    }

    public function step3(Request $request, Kunjungan $kunjungan)
    {
        // $attr = $request->all();
        $attr = $request->all();
        $attr['id'] = request('id');
        $attr['diagnosa_id'] = request('diagnosa_id');
        $attr['resep'] = request('resep');
        $attr['status'] = request('status');
        $attr['biaya'] = request('biaya');

        //dd($attr);
        // $kunjungan->update($attr);

        Kunjungan::whereId($attr['id'])->update($attr);
        session()->flash('success', 'Status pemeriksaan berhasil ditambah');
        return redirect('kunjungan');
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

} 