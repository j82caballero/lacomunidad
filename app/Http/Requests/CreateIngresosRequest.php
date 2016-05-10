<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateIngresosRequest extends Request
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
            'propietario_id'    => 'required|exists:users,id',
            'conceptos_id'      => 'required|exists:conceptos,id',
            'importe'           => 'required|numeric',
            'tipospagos_id'      => 'required|exists:tipospagos,id'
        ];
    }
}
