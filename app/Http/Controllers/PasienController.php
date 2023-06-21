<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PasienRequest;
use App\Models\User;

class PasienController extends Controller
{
    public function index()
    {
        if(Auth::user()->role== 'pasien'){
            return redirect('pasien/create');
        }
        
        return view('pasien.index', [
            'pasiens' => Pasien::get()
        ]);
    }

    public function create()
    {

        // dd($user);

        if(Pasien::where('user_id', Auth::user()->id)->exists()){
            $pasien = Pasien::where('user_id', Auth::user()->id)->first();
            // return $this->update($pasien);

            return redirect(route('pasien.update', $pasien));
        }
        return view('pasien.create');
    }

    public function store(PasienRequest $request)
    {
        $attr = $request->all();
        Pasien::create($attr);

        session()->flash('success', 'Data pasien berhasil ditambah');
        if(Auth::user()->role== 'pasien'){
            return redirect('/');
        }
        return redirect('pasien');
    }

    public function update(Pasien $pasien)
    {
        return view('pasien.edit', [
            'pasien' => $pasien
        ]);
    }

    public function edit(Pasien $pasien, PasienRequest $request)
    {
        $attr = $request->all();
        $pasien->update($attr);

        session()->flash('success', 'Data pasien berhasil diedit');
        return redirect('pasien');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        session()->flash('success', 'Data pasien berhasil dihapus');
        return redirect('pasien');
    }

    public function getPasien($id)
    {
        if (empty($id)) {
            return [];
        }

        $pasien = User::where('name', 'LIKE', "%$id%")->where('role', 'pasien')->get();

        // dd($pasien);
        // $pasien = DB::table('users')->where('name', 'LIKE', "%$id%")->where('role', 'pasien')->get();
        return $pasien;
    }
}
