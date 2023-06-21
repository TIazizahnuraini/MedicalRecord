<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanObatController extends Controller
{
    //
    public function index(){

        $obats = Obat::all();

        return view('laporan.obat.view', compact('obats'));
    }


    public function cetakPdf(){
        
        $date = date('Y-m-d H:i:s');
        $obats = Obat::all();

        $pdf = Pdf::loadView('laporan.obat.cetak', compact('obats'));
        return $pdf->download($date.'-laporan data obat.pdf');
    }
}
