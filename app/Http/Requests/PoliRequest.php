<?php

namespace App\Http\Requests;

use App\Models\Poli;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PoliRequest extends FormRequest
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
        $rule_poli_unique = Rule::unique('polis', 'nama_poli');
        if ($this->method() !== "POST") {
            $rule_poli_unique->ignore($this->route()->parameter('poli')->id);
        }

        return [
            'nama_poli'     => ['required', 'string', 'min:2', 'max:100', $rule_poli_unique],
            'jadwal_mulai'  => ['required', 'string', 'min:2', 'max:100'],
            'jadwal_selesai'=> ['required', 'string', 'min:2', 'max:100'],

        ];
    }
}
