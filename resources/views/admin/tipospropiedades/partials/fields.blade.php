<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('codigo', 'Código') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}
        </div>
    </div>
</div>