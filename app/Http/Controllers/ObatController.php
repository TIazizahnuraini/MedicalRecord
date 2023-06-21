<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Http\Requests\ObatRequest;

class ObatController extends Controller
{
    public function index()
    {
        return view('obat.index', [
            'obats' => Obat::get()
        ]);
    }

    public function create()
    {
        return view('obat.create', [
            'obat' => new Obat()
        ]);
    }

    public function store(ObatRequest $request)
    {
        $attr = $request->all();

        Obat::create($attr);

        session()->flash('success', 'Data obat berhasil ditambah');
        return redirect('obat');
    }

    public function update(Obat $obat)
    {
        return view('obat.edit', [
            'obat' => $obat
        ]);
    }

    public function detail(Obat $id)
    {
        return view('obat.index', [
            'obats' => Obat::get()
        ]);
    }
   
    public function edit(Obat $obat, ObatRequest $request)
    {
        $attr = $request->all();
        $obat->update($attr);

        session()->flash('success', 'Data obat berhasil diedit');
        return redirect('obat');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        session()->flash('success', 'Data obat berhasil dihapus');
        return redirect('obat');
    }

    public function getObat($nama_obat){
        if (empty($nama_obat)) {
            return [];
        }

        $obat = Obat::where('nama_obat', 'LIKE', "%$nama_obat%")->get();

        return $obat;
    }
}
