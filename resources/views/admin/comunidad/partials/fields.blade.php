<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
</div>
<div class="form-group">
    {!! Form::label('cif', 'CIF') !!}
    {!! Form::text('cif', null, ['class' => 'form-control', 'placeholder' => 'CIF']) !!}
</div>
<div class="form-group">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
</div>
<div class="form-group">
    {!! Form::label('provincia', 'Provincia') !!}
    {!! Form::text('provincia', null, ['class' => 'form-control', 'placeholder' => 'Provincia']) !!}
</div>
<div class="form-group">
    {!! Form::label('poblacion', 'Población') !!}
    {!! Form::text('poblacion', null, ['class' => 'form-control', 'placeholder' => 'Población']) !!}
</div>
<div class="form-group">
    {!! Form::label('codpostal', 'Código Postal') !!}
    {!! Form::number('codpostal', null, ['class' => 'form-control', 'placeholder' => 'Código Postal']) !!}
</div>

<div class="form-group">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
        <div>
            <span class="btn default btn-file">
                <span class="fileinput-new"> Selecciona imagen </span>
                <span class="fileinput-exists"> Cambiar </span>
                <input type="file" name="image">
            </span>
            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Borrar </a>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::textarea('descripcion', null, ['rows' => '4', 'class' => 'form-control', 'placeholder' => 'Descripción']) !!}
</div>