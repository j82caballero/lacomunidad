<?php

namespace App\Http\Controllers;

use App\Contabilidad;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContabilidadController extends Controller
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
    public function index(Request $request)
    {

        // Comprobamos que existe Fecha entrada y Fecha salida
        if ( isset($request['date_start'], $request['date_end'] ) && ($request['date_start'] != '' ) && $request['date_end'] != '') {

            // Obtenemos si hay fechas
            $fechas = $request->all();

        } else {

            // Sino hacemos la búsqueda del año actual

            $ano = Carbon::now();
            $ano = $ano->format('Y');

            $fechas = [
                'date_start' => Carbon::createFromDate($ano,01,01)->format('Y-m-d'),
                'date_end' => Carbon::createFromDate($ano,12,31)->format('Y-m-d')
            ];

        }

        $movimientos = Contabilidad::whereBetween('fecha', [$fechas['date_start'], $fechas['date_end']] )
            ->orderBy('fecha')
            ->paginate(7);

        // Total ingresos
        $ingresos = Contabilidad::whereBetween('fecha', [$fechas['date_start'], $fechas['date_end']] )
            ->where('tipo', 'ingreso')
            ->sum('importe');

        // Total gastos
        $gastos = Contabilidad::whereBetween('fecha', [$fechas['date_start'], $fechas['date_end']] )
            ->where('tipo', 'gasto')
            ->sum('importe');

        // Salgo anterior
        $saldoAnterior = Contabilidad::where('fecha', '<' ,[$fechas['date_start']] )
            ->sum('importe');

        return view('admin.contabilidad.index', compact('movimientos', 'fechas', 'ingresos', 'gastos', 'saldoAnterior'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
