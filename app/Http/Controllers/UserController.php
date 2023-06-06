<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'users' => User::get() 
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'Data user berhasil dihapus');
        return redirect('user');
    }
}
