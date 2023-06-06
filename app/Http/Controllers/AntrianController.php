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
        //dd($antrian);

        $poli = Poli::all();
        $mytime = date('Y-m-d');
        $antrians = [];
        foreach ($poli as $item){
            $totalAntrian = Antrian::where('poli_id', $item->id)->where('tanggal' , $mytime)->count();
            $antrianSekarang = Antrian::where('poli_id', $item->id)->where('tanggal', now())->where('status', 'Sudah Dilayani')->count();
            $dokter = Dokter::where('spesialis', $item->nama_poli)->first();
            if($dokter){
                $antrians[] = [
                    'poli' => $item->nama_poli,
                    'dokter' => $dokter->nama_dokter,
                    'jadwal' => $item->jadwal_mulai.' - '.$item->jadwal_selesai,
                    'totalAntrian' => $totalAntrian,
                    'antrianSekarang' => $antrianSekarang, 
                ];
            }
        }

        //dd($antrians);

        return view('antrian.antrian', ['antrians' => $antrians]);
    }

    public function create()
    {
        return view('antrian.create', 
        [
            'polis' => Poli::get(),
            'dokters' => Dokter::get(),
            'pasiens' => Pasien::get(),
        ]);
    }

    public function store(AntrianRequest $request)
    {
        $attr = $request->all();
        $attr['poli_id'] = request('poli');
        $attr['dokter_id'] = request('dokter_id');
        $attr['pasien_id'] = request('pasien_id');
        Antrian::create($attr);
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