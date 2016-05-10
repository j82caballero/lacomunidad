<table class="table table-striped table-hover">
    <tr>
        <th>Propiedad</th>
        <th>Propietario</th>
        <th>Forma de Pago</th>
        <th>Información</th>
        <th>Acciones</th>
    </tr>

    @foreach ($propiedades as $propiedad)

        <tr data-id="{{ $propiedad->id }}">
            <td>{{ $propiedad->propiedad() }}</td>
            <td>{{ $propiedad->propietario->name }}</td>
            <td>{{ $propiedad->propietario->tipoPago->pago() }}</td>
            <td>{{ $propiedad->propietario->informacion() }}</td>
            <td>
                <a href="#!" class="label label-sm label-danger btn-delete">
                    <i class="fa fa-trash-o"></i>
                    Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
