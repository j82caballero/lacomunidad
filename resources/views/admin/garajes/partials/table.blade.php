<table class="table table-striped table-hover">
    <tr>
        <th>Propiedad</th>
        <th>Clave garaje</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    @foreach ($propiedades as $propiedad)
        <tr data-id="{{ $propiedad->id }}">
            <td>{{ $propiedad->propiedad() }}</td>
            <td>{{ $propiedad->garaje->clave }}</td>
            <td>{{ $propiedad->garaje->descripcion }}</td>
            <td>
                <a href="#!" class="label label-sm label-danger btn-delete">
                    <i class="fa fa-trash-o"></i>
                    Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
