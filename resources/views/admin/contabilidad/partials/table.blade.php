<table class="table table-striped table-hover">
    <tr>
        <th>Propietario / Propiedad</th>
        <th>Concepto</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Importe</th>
        <th>Forma de Pago</th>
    </tr>


    @foreach ($movimientos as $movimiento)
        <tr data-id="{{ $movimiento->id }}">
            <td><a href="{{ $movimiento->propietario != null ? route('propietarios.show', $movimiento->propietario->id) : '#' }}">
                    {{ $movimiento->propietario != null ? $movimiento->propietario->name : 'Comunidad' }}
                    {{ $movimiento->propietario_id != null ? '( ' . $movimiento->propietario->propiedad->first()->propiedad() . ' )' : '' }}
                </a>
            </td>
            <td>{{ $movimiento->concepto->nombre }}</td>
            <td>{{ date('d-m-Y', strtotime($movimiento->fecha)) }}</td>
            <td>{{ $movimiento->tipo == 'ingreso' ? 'Ingreso' : 'Gasto' }}</td>
            <td style="color: {{ $movimiento->tipo == 'ingreso' ? 'green' : 'red' }};">{{ $movimiento->importe }} €</td>
            <td>{{ $movimiento->tipoPago->pago() }}</td>
        </tr>
    @endforeach
</table>
