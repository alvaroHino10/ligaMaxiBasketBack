<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarEquipoRequest extends FormRequest
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
            'cod_torn' => 'required',
            'cod_preinscrip' => 'required',
            'nombre_equi' => 'required',
            'categ_equi' => 'required',
            'pais_equi' => 'required',
            'discip_equi' => 'required',
            'color_equi' => 'required'
        ];
    }
}
