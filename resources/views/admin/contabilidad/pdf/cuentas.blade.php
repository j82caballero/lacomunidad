<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuentas</title>

    <link rel="stylesheet" type="text/css" href="css/reporte-pdf.css">

</head>
<body>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-11">
                            Estado de Cuenta General del
                            <span style="font-weight: bold;">{{ date('d-m-Y', strtotime($date_start)) . ' al ' . date('d-m-Y', strtotime($date_end)) }}</span>
                        </div>
                    </div>
                </div>
                <br>
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

                <br>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">

                    @include('admin.contabilidad.partials.table')

                </div>
            </div>
        </div>
    </div>

</body>
</html>