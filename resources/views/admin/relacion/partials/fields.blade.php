<div class="row">
    <div class="col-md-4">
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
    <div class="col-md-4">
        <div class="form-group">
            <label for="propietario_id">Seleccionar propietario</label>
            <select class="form-control" name="propietario_id" id="propietario_id">
                <option>--</option>
                @foreach($propietarios as $propietario)
                    <option value="{{ $propietario->id }}">{{ $propietario->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tipospago_id">Seleccionar forma de pago</label>
            <select class="form-control" name="tipospago_id" id="tipospago_id">
                <option>--</option>
                @foreach($tiposPagos as $tipoPago)
                    <option value="{{ $tipoPago->id }}">{{ $tipoPago->codigo . '-' . $tipoPago->descripcion }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mt-checkbox-list">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="vive_aqui" value="true"> Vive aquí
                <span></span>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mt-checkbox-list">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="contacto_principal" value="true"> Es el contacto principal
                <span></span>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mt-checkbox-list">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="dueno" value="true"> Es el dueño
                <span></span>
            </label>
        </div>
    </div>
</div>