<?php

namespace App\Http\Controllers;

use App\Comunidad;
use App\Concepto;
use App\Contabilidad;
use App\Http\Requests\CreateGastosRequest;
use App\TiposPagos;
use Illuminate\Http\Request;

use App\Http\Requests;

class GastosController extends Controller
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
        $movimientos = Contabilidad::where('tipo', 'gasto')
            ->orderBy('fecha')
            ->paginate(10);

        return view('admin.contabilidad.gastos.index', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposPagos = TiposPagos::all();
        $conceptos = Concepto::all()->where('tipo', 'gasto');

        return view('admin.contabilidad.gastos.create', compact('tiposPagos', 'conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGastosRequest $request)
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

        $gasto = new Contabilidad([
            'fecha'     => $data['fecha'],
            'importe'   => -1 * $data['importe'],
            'tipospagos_id'  => $data['tipospagos_id'],
            'conceptos_id'   => $data['conceptos_id'],
            'comentario'    => isset($data['comentario']) ? $data['comentario'] : ''
        ]);

        // Obtenemos la comunidad
        $comunidad = Comunidad::all()->first();

        $gasto->comunidad_id = $comunidad->id;
        $gasto->tipo = 'gasto';

        $gasto->save();

        // Si ha elegido continuar añadiendo gastos vamos directamente a la página crear gastos
        if (isset($data['continuar']) && $data['continuar'] == '1') {

            return redirect()->route('gastos.create');

        }

        return redirect()->route('gastos.index');
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
        $gasto = Contabilidad::findOrFail($id);

        $gasto->delete();

        $message = 'El gasto fue eliminado.';

        // Respuesta para petición Ajax
        if ($request->ajax()) {
            return $message;
        }

        Session::flash('message', $message);
        return redirect()->route('ingresos.index');
    }
}
