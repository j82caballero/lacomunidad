<table class="table table-striped table-hover">
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    @foreach ($propiedades as $propiedad)
        <tr data-id="{{ $propiedad->id }}">
            <td>{{ $propiedad->codigo }}</td>
            <td>{{ $propiedad->descripcion }}</td>
            <td>{{ $propiedad->tipoPropiedad->descripcion }}</td>
            <td>
                <a href="{{ route('propiedades.edit', $propiedad) }}" class="label label-sm label-info">
                    <i class="fa fa-edit"></i>
                    Editar</a>
                <a href="#!" class="label label-sm label-danger btn-delete">
                    <i class="fa fa-trash-o"></i>
                    Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
