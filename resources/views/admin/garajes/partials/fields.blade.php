<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="propiedad_id">Seleccionar propiedad</label>
            <select class="form-control" name="propiedad_id" id="propiedad_id">
                <option>--</option>
                @foreach($propiedades as $propiedad)
                    <option value="{{ $propiedad->id }}">{{ $propiedad->codigo . ' - ' . $propiedad->descripcion }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('clave', 'Clave') !!}
            {!! Form::text('clave', null, ['class' => 'form-control', 'placeholder' => 'Clave']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('descripcion', 'Desripción') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}
        </div>
    </div>
</div>