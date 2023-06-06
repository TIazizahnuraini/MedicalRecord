<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoliRequest;
use App\Models\Poli;

class PoliController extends Controller
{
    public function index()
    {
        return view('poli.index', [
            'polis' => Poli::get()
        ]);
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(PoliRequest $request)
    {
        $attr = $request->all();

        Poli::create($attr);

        session()->flash('success', 'Data poli berhasil ditambah');
        return redirect('poli');
    }

    public function update(Poli $poli)
    {
        return view('poli.edit', [
            'poli' => $poli
        ]);
    }

    public function edit(Poli $poli, PoliRequest $request)
    {
        $attr = $request->all();

        $poli->update($attr);

        session()->flash('success', 'Data poli berhasil diedit');
        return redirect('poli');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();

        session()->flash('success', 'Data poli berhasil dihapus');
        return redirect('poli');
    }
}
