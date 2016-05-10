<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos') !!}
            {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('dni', 'DNI') !!}
            {!! Form::number('dni', null, ['class' => 'form-control', 'placeholder' => 'DNI']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('telefono', 'Teléfono') !!}
            {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Repite Password') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repite Password']) !!}
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mt-checkbox-list">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="perfil" value="admin" {{ (isset($propietario['perfil']) && $propietario['perfil'] == 'admin') ? 'checked' : '' }}> Es administrador
                <span></span>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('observaciones', 'Observaciones') !!}
            {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => '3']) !!}
        </div>
    </div>
</div>