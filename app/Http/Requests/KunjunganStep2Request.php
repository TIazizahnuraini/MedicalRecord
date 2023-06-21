<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class KunjunganStep2Request extends FormRequest
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
            'kesadaran' => ['required'],
            'tb' => ['required'],
            'bb' => ['required'],
            'tekanan_darah' => ['required'],
            'respiratory_rake' => ['required'],
            'heart_rafe' => ['required'],
            // 'id' =>['required'],
        ];
    }
}
