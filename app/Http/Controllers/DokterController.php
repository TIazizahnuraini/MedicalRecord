<?php

namespace App\Http\Controllers;

use App\Models\{Poli, Dokter};
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DokterRequest;

class DokterController extends Controller
{
    public function index()
    {
        return view('dokter.index', [
            'dokters' => Dokter::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dokter.create', [
            'polis' => Poli::get()
        ]);
    }

    public function store(DokterRequest $request)
    {
        $attr = $request->all();

        Dokter::create($attr);

        session()->flash('success', 'Data dokter berhasil ditambah');
        return redirect('dokter');
    }

    public function update(Dokter $dokter)
    {
        return view('dokter.edit', [
            'dokter' => $dokter,
            'polis' => Poli::get()
        ]);
    }

    public function edit(Dokter $dokter, DokterRequest $request)
    {
        $attr = $request->all();

        $dokter->update($attr);

        session()->flash('success', 'Data dokter berhasil diedit');
        return redirect('dokter');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        session()->flash('success', 'Data dokter berhasil dihapus');
        return redirect('dokter');
    }

    public function getDokter($nama_dokter)
    {
        if (empty($nama_dokter)) {
            return [];
        }

        $dokter = DB::table('dokters')->where('nama_dokter', 'LIKE', "%$nama_dokter%")->get();

        return $dokter;
    }
}
