<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosaRequest;
use App\Models\Diagnosa;

class DiagnosaController extends Controller
{
    public function index()
    {
        return view('diagnosa.index', [
            'diagnosas' => Diagnosa::latest()->get()
        ]);
    }

    public function create()
    {
        return view('diagnosa.create');
    }

    public function store(DiagnosaRequest $request)
    {
        $attr = $request->all();

        Diagnosa::create($attr);

        session()->flash('success', 'Data diagnosa berhasil ditambah');
        return redirect('diagnosa');
    }

    public function update(Diagnosa $diagnosa)
    {
        return view('diagnosa.edit', [
            'diagnosa' => $diagnosa
        ]);
    }

    public function edit(Diagnosa $diagnosa, DiagnosaRequest $request)
    {
        $attr = $request->all();

        $diagnosa->update($attr);

        session()->flash('success', 'Data diagnosa berhasil diedit');
        return redirect('diagnosa');
    }

    public function destroy(Diagnosa $diagnosa)
    {
        $diagnosa->delete();

        session()->flash('success', 'Data diagnosa berhasil dihapus');
        return redirect('diagnosa');
    }

    public function getDiagnosa($nama_diagnosa)
    {
        if (empty($nama_diagnosa)) {
            return [];
        }

        $diagnosa = DB::table('diagnosas')->where('nama_diagnosa', 'LIKE', "%$nama_diagnosa%")->get();

        return $diagnosa;
    }
}
