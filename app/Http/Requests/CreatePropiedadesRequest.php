<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePropiedadesRequest extends Request
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
            'codigo'    => 'required|max:20|unique:propiedades,codigo',
            'descripcion' => 'required',
            'tipospropiedades_id' => 'required|exists:tipospropiedades,id'
        ];
    }
}
