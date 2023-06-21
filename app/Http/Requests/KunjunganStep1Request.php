<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class KunjunganStep1Request extends FormRequest
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
            'pasien_id' => ['required'],
            'tgl_kunjungan' => ['required'],
            'poli' => ['required'],
            'jenis_kunjungan' => ['required'],
            'tindak_lanjut' => ['required'],
            'keluhan' => ['required'],
            'terapi' => ['required'],
            // 'nama_dokter' => ['required'],
            'dokter_id' => ['required'],
            'keterangan' => ['required'],
        ];
    }
}
