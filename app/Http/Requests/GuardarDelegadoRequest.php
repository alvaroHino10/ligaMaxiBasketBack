<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarDelegadoRequest extends FormRequest
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
            'cod_deleg' => 'required',
            'cod_preinscrip' => 'required',
            'nombre_deleg' => 'required',
            'ap_delegado' => 'required',
            'num_iden_deleg' => 'required',
            'fecha_nac_delegado' => 'required',
            'telf_deleg' => 'required',
            'sexo_deleg' => 'required',
            'link_img_deleg' => 'required'
        ];
    }
}
