<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTiposPropiedadesRequest;
use App\Http\Requests\EditTiposPropiedadesRequest;
use App\TiposPropiedades;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class TiposPropiedadesController extends Controller
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
    public function index()
    {
        $tipospropiedades = TiposPropiedades::paginate(10);

        return view('admin.tipospropiedades.index', compact('tipospropiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.tipospropiedades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTiposPropiedadesRequest $request)
    {
        $tipopropiedad = new TiposPropiedades([
            'codigo' => strtoupper($request->codigo),
            'descripcion' => $request->descripcion
        ]);

        $tipopropiedad->save();

        // Si ha elegido continuar creando
        if (isset($request['continuar']) && $request['continuar'] == '1') {

            return redirect()->route('tipospropiedades.create');

        }

        return redirect()->route('tipospropiedades.index');


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
        $tipopropiedad = TiposPropiedades::findOrFail($id);

        return view('admin.tipospropiedades.edit', compact('tipopropiedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTiposPropiedadesRequest $request, $id)
    {

        $tipopropiedad = TiposPropiedades::findOrFail($id);

        $tipopropiedad->codigo = strtoupper($request->codigo);
        $tipopropiedad->descripcion = $request->descripcion;

        $tipopropiedad->save();

        return redirect()->route('tipospropiedades.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $tipopropiedad = TiposPropiedades::findOrFail($id);

        $tipopropiedad->delete();

        $message = 'El tipo de propiedad ' . $tipopropiedad->codigo . ' fue eliminada.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('tipospropiedades.index');
    }
}
