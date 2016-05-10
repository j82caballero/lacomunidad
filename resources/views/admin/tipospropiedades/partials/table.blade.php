<table class="table table-striped table-hover">
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    @foreach ($tipospropiedades as $tipospropiedad)
        <tr data-id="{{ $tipospropiedad->id }}">
            <td>{{ $tipospropiedad->codigo }}</td>
            <td>{{ $tipospropiedad->descripcion }}</td>

            <td>
                <a href="{{ route('tipospropiedades.edit', $tipospropiedad) }}" class="label label-sm label-info">
                    <i class="fa fa-edit"></i>
                    Editar</a>
                <a href="#!" class="label label-sm label-danger btn-delete">
                    <i class="fa fa-trash-o"></i>
                    Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>
