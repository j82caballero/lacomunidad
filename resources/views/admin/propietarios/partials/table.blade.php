<table class="table table-striped table-hover">
    <tr>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Perfil</th>
        <th>Observaciones</th>
        <th>Acciones</th>

    </tr>
    @foreach ($propietarios as $propietario)
        <tr data-id="{{ $propietario->id }}">
            <td><a href="{{ route('propietarios.show', $propietario->id) }}">{{ $propietario->name }}</a></td>
            <td>{{ $propietario->dni }}</td>
            <td>{{ $propietario->telefono }}</td>
            <td>{{ $propietario->email }}</td>
            <td>{{ $propietario->perfil == 'admin' ? 'Administrador' : 'Usuario' }}</td>
            <td>{{ $propietario->observaciones }}</td>
            <td>
                <a href="{{ route('propietarios.edit', $propietario) }}" class="label label-sm label-info">
                    <i class="fa fa-edit"></i>
                    Editar</a>
                @if(auth()->user()->id != $propietario->id)
                    <a href="#!" class="label label-sm label-danger btn-delete">
                        <i class="fa fa-trash-o"></i>
                        Eliminar</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
