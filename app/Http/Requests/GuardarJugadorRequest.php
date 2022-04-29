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
            'nombrejug' => 'required',
            'primapjug' => 'required',
            'segapjug' => 'required',
            'correojug' => 'required',
            'numidentjug' => 'required',
            'nacionjug' => 'required',
            'estciviljug' => 'required',
            'fechanacjug' => 'required',
            'telfjug' => 'required',
            'sexojug' => 'required',
            'domjug' => 'required',
            'numequijug' => 'required',
            'linkimgjug' => 'required'
        ];
    }
}
