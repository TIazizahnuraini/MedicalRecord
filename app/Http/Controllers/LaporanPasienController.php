<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    //
    public function index(){
        $users = User::where('role','pasien')->get();
        // dd($users);
        return view('laporan.pasien.view', compact('users'));
    }

    public function cetakPdf(){
        $date = date('Y-m-d H:i:s');
        $users = User::where('role','pasien')->get();

        $pdf = PDF::loadView('laporan.pasien.cetak', compact('users'));
        $pdf->setPaper('A4','portrait');
        // dd($users);
        // return view('laporan.pasien.cetak', compact('users'));

        return $pdf->download($date.'-laporan data pasien.pdf');
    }

    public function cetakPdfPasien(User $user){

        // $data = User::find($user);

        // dd($data);

        // return view('laporan.pasien.cetakPasien', ['user'=>$user]);

        $date = date('Y-m-d H:i:s');

        $pdf = PDF::loadView('laporan.pasien.cetakPasien', ['user'=>$user]);
        $pdf->setPaper('A4','portrait');
        // dd($users);
        // return view('laporan.pasien.cetak', compact('users'));

        return $pdf->download($date.'-laporan data pasien '.$user->name.'.pdf');

    }
}