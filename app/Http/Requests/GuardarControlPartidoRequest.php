<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarControlPartidoRequest extends FormRequest
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
            'nombre_contr_part' => 'required',
            'prim_ap_contr_part' => 'required',
            'seg_ap_contr_part' => 'required',
            'num_iden_contr_part' => 'required',
            'fecha_nac_contr_part' => 'required',
            'link_img_contr_part' => 'required',
            'rol_contr_part' => 'required',
        ];
    }
}
