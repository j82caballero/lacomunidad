<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="propietario_id">Seleccionar propietario/os</label>
            <select class="form-control" name="propietario_id" id="propietario_id">
                <option value="all">Todos los propietarios</option>
                @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->id }}">{{ $propietario->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('texto') !!}
            {!! Form::textarea('texto', null, ['class' => 'form-control', 'rows' => '15']) !!}
        </div>
    </div>
</div>