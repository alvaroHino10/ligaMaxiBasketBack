<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class guardarTorneoRequest extends FormRequest
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
            'cod_organiz' => 'required',
            'nombre_torn' => 'required',
            'ciud_torn' => 'required',
            'pais_torn' => 'required',
            'fecha_ini_torn' => 'required',
            'fecha_fin_torn' => 'required',
            'gestion_torn' => 'required',
            'fecha_ini_preinscrip' => 'required',
            'fecha_fin_preinscrip' => 'required'
        ];
    }
}
