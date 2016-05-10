<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="conceptos_id">Seleccionar concepto</label>
            <select class="form-control" name="conceptos_id" id="conceptos_id">
                <option>--</option>
                @foreach($conceptos as $concepto)
                    <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div id="field_fecha" class="form-group">
            <label for="fecha" class="control-label">
                Fecha
            </label>

            <div class="controls">
                <input class="form-control" id="fecha" name="fecha" type="date">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('importe', 'Importe') !!}
            {!! Form::number('importe', null, ['class' => 'form-control', 'placeholder' => 'Importe']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="tipospagos_id">Seleccionar forma de pago</label>
            <select class="form-control" name="tipospagos_id" id="tipospagos_id">
                <option>--</option>
                @foreach($tiposPagos as $tipoPago)
                    <option value="{{ $tipoPago->id }}">{{ $tipoPago->codigo . '-' . $tipoPago->descripcion }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('comentario', 'Comentario') !!}
            {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows' => '3']) !!}
        </div>
    </div>
</div>