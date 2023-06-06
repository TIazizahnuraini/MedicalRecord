<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_dokter' => ['required', 'string', 'min:2', 'max:100'],
            'jenis_kelamin' => ['required', 'string', 'min:5', 'max:50'],
            'spesialis' => ['required', 'string', 'min:1', 'max:100'],
            'tempat_lahir' => ['required', 'string', 'min:3'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'min:3'],
            'nik' => ['required', 'string', 'min:5', 'max:50'],
            'sip' => ['required', 'string', 'min:5', 'max:50'],
            'no_hp' => ['required', 'string', 'min:10', 'max:15'],
        ];
    }
}
