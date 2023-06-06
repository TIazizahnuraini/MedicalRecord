<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class DiagnosaRequest extends FormRequest
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
            'nama_diagnosa' => ['required', 'string', 'min:2'],
            'name_diagnosa' => ['required', 'string', 'min:2'],
        ];
    }
}
