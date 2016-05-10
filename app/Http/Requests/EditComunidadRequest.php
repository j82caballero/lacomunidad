<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditComunidadRequest extends Request
{
    /**
     * @var Route
     */
    private $route;

    /**
     * EditComunidadRequest constructor.
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }


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
            'cif'       => 'required | unique:comunidad,cif,' . $this->route->getParameter('comunidad'),
            'direccion' => 'required | max:255',
            'provincia' => 'required | max:255',
            'poblacion' => 'required | max:255',
            'codpostal' => 'required | max:5',
            'image'     => 'image'
        ];
    }
}
