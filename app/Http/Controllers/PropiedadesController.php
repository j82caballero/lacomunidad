<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Http\Requests\CreatePropiedadesRequest;
use App\Http\Requests\EditPropiedadesRequest;
use App\Propiedades;
use App\TiposPropiedades;
use Illuminate\Http\Request;

use App\Http\Requests;

class PropiedadesController extends Controller
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

        $comunidad = Comunidad::all()->first();

        if ($comunidad->paso_registro == '2') {
            $comunidad->paso_registro = '3';
            $comunidad->save();
        }


        $propiedades = Propiedades::paginate(10);

        return view('admin.propiedades.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipospropiedades = TiposPropiedades::all();

        return view('admin.propiedades.create', compact('tipospropiedades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropiedadesRequest $request)
    {
        $propiedad = Propiedades::create($request->all());

        // Si ha elegido continuar creando
        if (isset($request['continuar']) && $request['continuar'] == '1') {

            return redirect()->route('propiedades.create');

        }

        return redirect()->route('propiedades.index');
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
        $propiedad = Propiedades::findOrFail($id);

        // Buscamos los tipos de propiedades
        $tipospropiedades = TiposPropiedades::all();

        return view('admin.propiedades.edit', compact('propiedad', 'tipospropiedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPropiedadesRequest $request, $id)
    {
        $propiedad = Propiedades::findOrFail($id);

        $propiedad->fill($request->all());

        $propiedad->save();

        return redirect()->route('propiedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $propiedad = Propiedades::findOrFail($id);

        $propiedad->delete();

        $message = 'La propiedad ' . $propiedad->codigo . ' fue eliminada.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('propiedades.index');
    }
}
