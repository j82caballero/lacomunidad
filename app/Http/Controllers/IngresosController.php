<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Concepto;
use App\Contabilidad;
use App\Http\Requests\CreateIngresosRequest;
use App\TiposPagos;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class IngresosController extends Controller
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
        // Buscamos los ingresos
        $movimientos = Contabilidad::where('tipo', 'ingreso')
            ->orderBy('fecha')
            ->paginate(10);

        return view('admin.contabilidad.ingresos.index', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposPagos = TiposPagos::all();
        // Propietarios que tengan una propiedad
        $propietarios = User::has('propiedad')->get();

        $conceptos = Concepto::all()->where('tipo', 'ingreso');

        return view('admin.contabilidad.ingresos.create', compact('tiposPagos', 'propietarios', 'conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIngresosRequest $request)
    {
        // Obtenemos los datos
        $data = $request->all();

        // Comprobamos que la fecha sea correcta
        if ( ! isset($data['fecha'] ) || ($data['fecha'] == '' ) ) {
            $messages = ['Introduzca una fecha'];
            return redirect()->back()
                ->withErrors($messages)
                ->withInput();
        }

        $ingreso = new Contabilidad([
            'tipo'      => 'ingreso',
            'fecha'     => $data['fecha'],
            'importe'   => $data['importe'],
            'propietario_id' => $data['propietario_id'],
            'tipospagos_id'  => $data['tipospagos_id'],
            'conceptos_id'   => $data['conceptos_id'],
            'comentario'    => isset($data['comentario']) ? $data['comentario'] : ''
        ]);

        // Obtenemos la comunidad
        $comunidad = Comunidad::all()->first();

        $ingreso->comunidad_id = $comunidad->id;

        $ingreso->save();


        // Si ha elegido continuar añadiendo ingresos vamos directamente a la página crear ingresos
        if (isset($data['continuar']) && $data['continuar'] == '1') {

            return redirect()->route('ingresos.create');

        }

        return redirect()->route('ingresos.index');


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
        $ingreso = Contabilidad::findOrFail($id);

        $ingreso->delete();

        $message = 'El ingreso fue eliminado.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('ingresos.index');
    }
}
