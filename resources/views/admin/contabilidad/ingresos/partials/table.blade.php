<table class="table table-striped table-hover">
    <tr>
        <th>Propietario</th>
        <th>Concepto</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Importe</th>
        <th>Forma de Pago</th>
        <th>Comentarios</th>
        <th>Acciones</th>
    </tr>
    @foreach ($movimientos as $movimiento)
        <tr data-id="{{ $movimiento->id }}">
            <td><a href="{{ $movimiento->propietario != '0' ? route('propietarios.show', $movimiento->propietario->id) : '#' }}">{{ $movimiento->propietario != '0' ? $movimiento->propietario->name : '-' }}</a></td>
            <td>{{ $movimiento->concepto->nombre }}</td>
            <td>{{ date('d-m-Y', strtotime($movimiento->fecha)) }}</td>
            <td>{{ $movimiento->tipo == 'ingreso' ? 'Ingreso' : 'Gasto' }}</td>
            <td style="color: {{ $movimiento->tipo == 'ingreso' ? 'green' : 'red' }};">{{ $movimiento->importe }} €</td>
            <td>{{ $movimiento->tipoPago->pago() }}</td>
            <td>{{ $movimiento->comentario }}</td>
            <td>
                <a href="#!" class="label label-sm label-danger btn-delete">
                    <i class="fa fa-trash-o"></i>
                    Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
