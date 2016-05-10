<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Garaje;
use App\Propiedades;
use Illuminate\Http\Request;

use App\Http\Requests;

class GarajesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comunidad $comunidad)
    {
        // Sino existe la comunidad, tenemos que crearla
        if ($comunidad->all()->first() == null) {
            return redirect()->route('comunidad.create');
        }

        // Si estamos configurando la comunidad
        $comunidad = Comunidad::all()->first();

        if ($comunidad->paso_registro == '5') {
            $comunidad->paso_registro = '6';
            $comunidad->save();
        }

        // Paso las propiedades con garajes
        $propiedades = Propiedades::has('garaje')->paginate(10);

        return view('admin.garajes.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos las propiedades sin garaje
        $propiedades = Propiedades::where('garaje_id', null)->get();

        return view('admin.garajes.create', compact('propiedades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Comprobamos que los datos necesarios existan
        if ( ! isset($request->propiedad_id, $request->clave, $request->descripcion) || $request->propiedad_id == '--' || empty($request->clave) || empty($request->descripcion))
        {
            return redirect()->back()->withInput();
        }

        // Una vez comprobado que tenemos todos los datos, los buscamos en la BBDD para no crear inconsistencia en ella
        $propiedad = Propiedades::findOrFail($request->propiedad_id);

        // Una vez encontrado los datos, se procede a la relación.
        // Empezamos por el garaje

        $garaje = new Garaje([
            'clave' => $request->clave,
            'descripcion' => $request->descripcion
        ]);

        $garaje->save();

        // Y terminamos con la propiedad
        $propiedad->garaje_id = $garaje->id;
        $propiedad->save();

        // Si ha elegido continuar creando
        if (isset($request['continuar']) && $request['continuar'] == '1') {

            return redirect()->route('garajes.create');

        }

        return redirect()->route('garajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // Buscamos tanto la propiedad como el garaje para dejar la relación vacía.
        $propiedad = Propiedades::findOrFail($id);
        $garaje = Garaje::findOrFail($propiedad->garaje_id);

        // Quitamos la relación
        $propiedad->garaje_id = null;
        $propiedad->save();

        // Y terminamos con el garaje
        $garaje->delete();

        $message = 'La relación de la propiedad '. $propiedad->propiedad() . ' y el garaje ' . $garaje->clave . ' fue eliminada.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('garajes.index');
    }
}
