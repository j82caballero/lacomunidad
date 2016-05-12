@extends('admin.layout')

@section('active-gestion')
    active open
@endsection

@section('gestion')
    open
@endsection

@section('gestion-resumen')
    active
@endsection

@section('pageheader')

    @include('admin.contabilidad.partials.breadcontabilidad')

    <h3 class="page-title"> Gestión Económica
        <small>Estado de cuentas</small>
    </h3>

    @endsection

    @section('css')
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Seleccionar Periodo</div>

                <div class="panel-body">

                    {!! Form::open(['route' => ['contabilidad.index'], 'method' => 'GET']) !!}

                        @include('admin.contabilidad.partials.buscar')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-11">
                            Estado de Cuenta General del
                            <span style="font-weight: bold;">{{ isset($fechas['date_start'], $fechas['date_end']) ? date('d-m-Y', strtotime($fechas['date_start'])) . ' al ' . date('d-m-Y', strtotime($fechas['date_end'])) : '' }}</span>
                        </div>
                        <div class="col-md-1">
                            @php
                                $data = [
                                    'date_start' => isset($fechas['date_start']) ? $fechas['date_start'] : '',
                                    'date_end'   => isset($fechas['date_end']) ? $fechas['date_end'] : ''
                                ];
                            @endphp
                            <a href="{{ url('reportes', $fechas) }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Saldo Anterior: </th>
                            <th>Ingresos: </th>
                            <th>Gastos: </th>
                            <th>Saldo Final: </th>
                        </tr>

                        <tr>
                            <td style="color: {{ $saldoAnterior >= '0' ? 'green' : 'red' }};">{{ $saldoAnterior }} €</td>
                            <td style="color: {{ $ingresos >= '0' ? 'green' : 'red' }};">{{ $ingresos }} €</td>
                            <td style="color: {{ $gastos >= '0' ? 'green' : 'red' }};">{{ $gastos }} €</td>
                            <td style="color: {{ ($ingresos + $gastos + $saldoAnterior) >= '0' ? 'green' : 'red' }};">{{ $ingresos + $gastos + $saldoAnterior}} €</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">

                    @include('admin.contabilidad.partials.table')

                    {{ $movimientos->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection