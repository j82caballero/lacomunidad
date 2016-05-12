<table class="table table-striped table-hover">
    <tr>
        <th>Propietario</th>
        <th>Teléfono</th>
        <th>Perfil</th>
        <th>Propiedad</th>
    </tr>
    @foreach ($comunidad->propietarios as $propietario)
        @if ($propietario->activo)
            <tr data-id="{{ $propietario->id }}">
                <td><a href="{{ route('propietarios.show', $propietario->id) }}">{{ $propietario->name }}</a></td>
                <td>{{ $propietario->telefono }}</td>
                <td>{{ $propietario->perfil == 'admin' ? 'Administrador' : 'Usuario' }}</td>
                <td>{{ $propietario->propiedad->first()->propiedad() }}</td>
            </tr>
        @endif
    @endforeach
</table>
