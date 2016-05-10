<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('codigo', 'Código') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tipospropiedades_id">Tipo de propiedad</label>
            <select class="form-control" name="tipospropiedades_id" id="tipospropiedades_id">
                @foreach($tipospropiedades as $tipopropiedad)
                    <option value="{{ $tipopropiedad->id }}">{{ $tipopropiedad->codigo . ' - ' . $tipopropiedad->descripcion }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>