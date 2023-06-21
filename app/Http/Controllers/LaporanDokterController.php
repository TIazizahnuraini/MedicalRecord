<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanDokterController extends Controller
{
    //
    public function index()
    {

        $dokters = Dokter::all();

        return view('laporan.dokter.view', compact('dokters'));
    }

    public function cetakPdf()
    {
        $dokters = Dokter::all();
        $date = date('Y-m-d H:i:s');

        $pdf = Pdf::loadView('laporan.dokter.cetak', compact('dokters'));

        return $pdf->download($date . '-Laporan daftar dokter.pdf');
    }
}
