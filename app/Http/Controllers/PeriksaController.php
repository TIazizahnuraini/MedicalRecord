<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Poli;
use App\Models\Antrian;
use DateTime;

class PeriksaController extends Controller
{
    public function index()
    {
        $polis = Poli::get();
        foreach($polis as $poli){
            $cariAntrian = Antrian::where('status', 'belum dilayani')->where('tanggal', (new DateTime())->format('Y-m-d'))->orderBy('nomor_antrian', 'ASC')->first();
            $antrian[$poli->nama_poli] = $cariAntrian->nomor_antrian;
        }

        // dd($antrian['Poli Umum']['sisaAntrian']);
        
        return view('periksa.index', [
            'polis' => $polis,
            'antrian' => $antrian,
        ]);
    }

    // public function periksa.pasien()
    // {
        
    // }


}
