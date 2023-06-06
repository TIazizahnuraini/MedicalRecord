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
            'name' => ['required'],
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ];
    }
}
