<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class UpdatePersonaRequest extends Request
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
        $idadulto = $this->route('Persona');

        return [
           'foto' => 'image',
            'rfc' => 'required|string|min:3|max:60',
            'curp' => 'required|string|min:3|max:80',
            'apellidoPaterno' => 'required|string|min:3|max:80',
            'apellidoMaterno' => 'required|string|min:3|max:60',
            'nombre' => 'required|string|min:3|max:80',
            'edad' => 'required|string|min:3|max:80',
        ];
    }
}
