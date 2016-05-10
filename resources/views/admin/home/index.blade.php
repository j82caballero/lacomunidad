<div class="col-md-4">
    <!--begin: widget 1-1 -->
    <div class="mt-widget-1">
        <div class="mt-img">
            <img src="{{ asset($comunidad->image) }}"> </div>
        <div class="mt-body">
            <h3 class="mt-username">{{ $comunidad->nombre }}</h3>
            <p class="mt-user-title"> {{ $comunidad->direccion }} </p>
            <div class="mt-stats">
                <div class="btn-group btn-group btn-group-justified" style="padding: 10px;">
                    La Comunidad tiene {{ count($comunidad->propietarios) }} propietarios
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    @include('admin.home.partials.table')
</div>