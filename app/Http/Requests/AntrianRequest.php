<?php

namespace App\Http\Requests;
use App\Http\Requests\AntrianRequest;
use Illuminate\Foundation\Http\FormRequest;
class AntrianRequest extends FormRequest
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
            'nama_pasien' => ['required'],
            'tanggal' => ['required'],
            'status' => ['required'],
            'poli' => ['required'],
            'nama_pasien' => ['required'],
            'pasien_id' => ['required'],
            'nama_dokter' => ['required'],
            'dokter_id' => ['required'],
        ];
    }
}
