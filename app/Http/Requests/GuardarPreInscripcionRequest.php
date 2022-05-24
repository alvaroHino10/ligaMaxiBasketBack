<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPreInscripcionRequest extends FormRequest
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
            'num_transfer_preinscrip' => 'required',
            'costo_preinscrip' => 'required',
            'fecha_preinscrip' => 'required',
            'link_img_comprob' => 'required',
        ];
    }
}
