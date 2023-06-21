<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
            'tempat_lahir'      => ['required', 'string', 'min:3', 'max:50'],
            'tgl_lahir'         => ['required', 'date'],
        ];
    }
}
