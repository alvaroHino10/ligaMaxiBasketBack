<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPartidoRequest extends FormRequest
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
            'equipo_A' => 'required',
            'equipo_B' => 'required',
            'partido' => 'required|array',
            'partido.fecha_part'=> 'required',
            //'partido.lugar_part' => 'required',
            'partido.hora_ini_part'=> 'required',
            'partido.hora_fin_part'=> 'required',
            'arbitro_1' => 'required',
            'arbitro_2' => 'required',
            'fiscal' => 'required',
            'mesa' => 'required'
        ];
    }
}
