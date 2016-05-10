<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Junta de vecinos</div>

            <div class="panel-body">

                <p>Estimado propietario {{ $propietario->name }} a fecha de {{ \Carbon\Carbon::now()->format('d-m-Y') }} le informo sobre la siguiente junta:</p>

            </div>

            <div class="panel-body">

                <p>{{ $texto }}</p>

            </div>
        </div>
    </div>
</div>