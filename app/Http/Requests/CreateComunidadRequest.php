<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateComunidadRequest extends Request
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
            'nombre'    => 'required',
            'cif'       => 'required | unique:comunidad,cif',
            'direccion' => 'required | max:255',
            'provincia' => 'required | max:255',
            'poblacion' => 'required | max:255',
            'codpostal' => 'required | max:5',
            'image'     => 'image'
        ];
    }
}
