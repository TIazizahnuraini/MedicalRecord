<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class LaporanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pasien'       => ['required', 'string', 'min:3', 'max:100'],
            'tempat_lahir'      => ['required', 'string', 'min:3', 'max:50'],
            'tgl_lahir'         => ['required', 'date'],
            'jenis_kelamin'     => ['required', 'string'],
            'alamat'            => ['required', 'string', 'min:3'],
            'jenis_registrasi'  => ['required', 'string'],
            'no_bpjs'           => ['required_if:jenis_registrasi,==,BPJS'],
            'no_hp'             => ['required', 'min:10', 'max:15'],
            'tgl_registrasi'    => ['required', 'date'],
            'agama'             => ['required', 'string'],
            'pekerjaan'         => ['required', 'string'], 
        ];
    }
}
