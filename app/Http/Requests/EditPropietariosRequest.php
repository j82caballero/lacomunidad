<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditPropietariosRequest extends Request
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
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'dni'   => 'required|max:8|unique:users,dni,' . $this->route->getParameter('propietarios'),
            'telefono'  => 'required|max:9',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route->getParameter('propietarios'),
            'password' => 'confirmed'
        ];
    }
}
