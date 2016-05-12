<?php

namespace App\Http\Controllers;

use App;
use App\Contabilidad;
use Illuminate\Http\Request;

use App\Http\Requests;
use View;

class PdfController extends Controller
{
    public function crear_reporte($date_start, $date_end)
    {
        //        $data = $this->getData();
//        $date = date('Y-m-d');
//        $invoice = "2222";
//        $view =  \View::make('invoice', compact('data', 'date', 'invoice'))->render();
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($view);
//        return $pdf->stream('invoice');

        // Comprobamos que existe Fecha entrada y Fecha salida
        if ( ! isset($date_start, $date_end ) && ($date_start != '' ) && $date_end != '') {

            return redirect()->back();

        }

        $movimientos = Contabilidad::whereBetween('fecha', [$date_start, $date_end] )
            ->orderBy('fecha')->get();

        // Total ingresos
        $ingresos = Contabilidad::whereBetween('fecha', [$date_start, $date_end] )
            ->where('tipo', 'ingreso')
            ->sum('importe');

        // Total gastos
        $gastos = Contabilidad::whereBetween('fecha', [$date_start, $date_end] )
            ->where('tipo', 'gasto')
            ->sum('importe');

        // Salgo anterior
        $saldoAnterior = Contabilidad::where('fecha', '<' ,[$date_start] )
            ->sum('importe');

        $view =  View::make('admin.contabilidad.pdf.cuentas', compact('movimientos', 'date_start', 'date_end', 'ingresos', 'gastos', 'saldoAnterior'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('reporte');

    }

}
