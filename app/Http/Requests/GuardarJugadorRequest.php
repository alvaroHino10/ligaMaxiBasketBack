<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarJugadorRequest extends FormRequest
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
            'cod_equi' => 'required',
            'nombre_jug' => 'required',
            'prim_ap_jug' => 'required',
            'seg_ap_jug' => 'required',
            'correo_jug' => 'required',
            'num_iden_jug' => 'required',
            'nacion_jug' => 'required',
            'est_civil_jug' => 'required',
            'fecha_nac_jug' => 'required',
            'telf_jug' => 'required',
            'sexo_jug' => 'required',
            'dom_jug' => 'required',
            'num_equi_jug' => 'required',
            'link_img_jug' => 'required'
        ];
    }
}
