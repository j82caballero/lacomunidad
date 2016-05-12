<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Propiedades;
use App\TiposPagos;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RelacionController extends Controller
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

        if ($comunidad->paso_registro == '4') {
            $comunidad->paso_registro = '5';
            $comunidad->save();
        }

        // Paso las propiedades con propietarios
        $propiedades = Propiedades::has('propietario')->paginate(10);

        return view('admin.relacion.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pagos
        $tiposPagos = TiposPagos::all();

        // Propiedades sin propietario
        $propiedades = Propiedades::where('user_id', null)->get();

        // Propietarios sin propiedad
        $propiedadesId = DB::table('propiedades')
            ->whereNotNull('user_id')
            ->lists('user_id');

        $propietarios = User::select()->where('activo', true)
            ->whereNotIn('id', $propiedadesId)->get();


        return view('admin.relacion.create', compact('propiedades', 'propietarios' ,'tiposPagos'));
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
        if ( ! isset($request->propiedad_id, $request->propietario_id, $request->tipospago_id) || $request->propiedad_id == '--' || $request->propietario_id == '--' || $request->tipospago_id == '--')
        {
            return redirect()->back()->withInput();
        }

        // Una vez comprobado que tenemos todos los datos, los buscamos en la BBDD para no crear inconsistencia en ella
        $propietario = User::findOrFail($request->propietario_id);
        $propiedad = Propiedades::findOrFail($request->propiedad_id);
        $tipopago = TiposPagos::findOrFail($request->tipospago_id);

        $comunidad = Comunidad::all()->first();

        // Una vez encontrado los datos, se procede a la relación.
        // Empezamos por el propietario
        $propietario->comunidad_id = $comunidad->id;
        $propietario->vive_aqui = (isset($request->vive_aqui) && $request->vive_aqui == 'true') ? '1' : '0';
        $propietario->contacto_principal = (isset($request->contacto_principal) && $request->contacto_principal == 'true') ? '1' : '0';
        $propietario->dueno = (isset($request->dueno) && $request->dueno == 'true') ? '1' : '0';
        $propietario->tipospagos_id = $tipopago->id;

        $propietario->save();

        // Y terminamos con la propiedad
        $propiedad->user_id = $propietario->id;
        $propiedad->save();

        // Si ha elegido continuar creando
        if (isset($request['continuar']) && $request['continuar'] == '1') {

            return redirect()->route('relacion.create');

        }

        return redirect()->route('relacion.index');

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

        // Buscamos tanto la propiedad como el propietario para dejar la relación vacía.
        $propiedad = Propiedades::findOrFail($id);
        $propietario = User::findOrFail($id);

        // Quitamos la relación
        $propietario->comunidad_id = null;
        $propietario->vive_aqui = '0';
        $propietario->contacto_principal = '0';
        $propietario->dueno = '0';
        $propietario->tipospagos_id = null;

        $propietario->save();

        // Y terminamos con la propiedad
        $propiedad->user_id = null;
        $propiedad->save();


        $message = 'La relación del propietario '. $propietario->name . ' y la propiedad ' . $propiedad->codigo . ' fue eliminada.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('relacion.index');
    }
}
