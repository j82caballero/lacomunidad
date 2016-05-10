<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Comunidad;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Comunidad $comunidad, Request $request)
    {
        // Comprobamos si está registrada la comunidad
        $comunidad = Comunidad::all()->first();

        $urls = [
            '1'      => 'comunidad.create',
            '2'      => 'tipospropiedades.index',
            '3'      => 'propiedades.index',
            '4'      => 'propietarios.index',
            '5'      => 'relacion.index',
            '6'      => 'garajes.index'
        ];

        $paso_registro = (count($comunidad) != 0) ? $comunidad->paso_registro : 1;

        // Si aún no está configurada la Comunidad la configuramos
        if ($paso_registro < 6) {

            $url = $urls[$paso_registro];

            return view('home', compact('paso_registro', 'url'));

        } else {

            $comunidad = Comunidad::all()->first();

            return view('home', compact('paso_registro', 'comunidad'));

        }

    }
}