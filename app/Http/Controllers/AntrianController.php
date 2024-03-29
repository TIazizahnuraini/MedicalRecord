<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{Antrian, Poli, Pasien, Dokter};
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AntrianRequest;

class AntrianController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'pasien'){
           return $this->antrian();
        }
        return view('antrian.index', [
            'antrians' => Antrian::get(),
        ]);
    }

    public function antrian()
    {
        // dd($antrian);

        $poli = Poli::all();
        $mytime = date('Y-m-d');

        $cekPeriksa = Antrian::where('pasien_id', Auth::user()->id)->where('tanggal', $mytime)->first();



        // dd($mytime);
        $antrians = [];
        foreach ($poli as $item){
            $totalAntrian = Antrian::where('poli_id', $item->id)->where('tanggal' , $mytime)->count();
            $antrianSekarang = Antrian::where('poli_id', $item->id)->where('tanggal', $mytime)->where('status', 'Sudah dilayani')->count();
            // $dokter = Dokter::where('spesialis', $item->nama_poli)->first();
            // if($dokter){
                $antrians[] = [
                    'poli' => $item->nama_poli,
                    // 'dokter' => $dokter->nama_dokter,
                    'jadwal' => $item->jadwal_mulai.' - '.$item->jadwal_selesai,
                    'totalAntrian' => $totalAntrian,
                    'antrianSekarang' => $antrianSekarang, 
                ];
            // }

            $antrianUser = Antrian::where('pasien_id', Auth::user()->id)->where('tanggal', $mytime)->where('status', 'Belum dilayani')->first();

            // dd($antrianUser);
        }

        //dd($antrians);

        return view('antrian.antrian', ['antrians' => $antrians, 'antrianUser'=>$antrianUser, 'cekPeriksa' => $cekPeriksa]);
    }

    public function create()
    {
        // dd('masuk');
        return view('antrian.create', 
        [
            'polis' => Poli::get(),
            'dokters' => Dokter::get(),
            'pasiens' => Pasien::get(),
        ]);
    }

    public function store(AntrianRequest $request)
    {
        //dd('masuk');
        // dd($request->all());

        $cariAntrian = Antrian::where('poli_id', $request->poli)->where('tanggal', $request->tanggal)->orderBy('nomor_antrian', 'desc')->first();
        if($cariAntrian){
            $attr = $request->all();
            $attr['poli_id'] = request('poli');
            $attr['dokter_id'] = request('dokter_id');
            $attr['pasien_id'] = request('pasien_id');
            $attr['nomor_antrian'] = ($cariAntrian->nomor_antrian + 1);
            //dd($attr);
            Antrian::create($attr);
        }else{
            $attr = $request->all();
            $attr['poli_id'] = request('poli');
            $attr['dokter_id'] = request('dokter_id');
            $attr['pasien_id'] = request('pasien_id');
            $attr['nomor_antrian'] = 1;
            //dd($attr);
            Antrian::create($attr);
        }
        
       // $posted = auth()->user()->antrians()->create($attr);

        session()->flash('success', 'Data antrian pasien berhasil ditambah' .$attr['poli_id']);
        return redirect('antrian');
    }

    public function update(Antrian $antrian)
    {
        return view('antrian.edit', [
            'antrian' => $antrian,
            'polis' => Poli::get()
        ]);

        // return view('antrian.edit');
    }
    
    public function edit(Antrian $antrian, AntrianRequest $request)
    {
        //dd($request);
        $attr = $request->all();
        $antrian->update($attr);

        //Antrian::whereId($attr['id'])->update($attr);
        session()->flash('success', 'Data antrian pasien berhasil diedit');
        return redirect('antrian');
    }

    public function destroy(Antrian $antrian)
    {
        $antrian->delete();

        session()->flash('success', 'Data antrian pasien berhasil dihapus');
        return redirect('antrian');
    }

}