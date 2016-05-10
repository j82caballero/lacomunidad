@extends('admin.layout')

@section('active-comunidad')
    active open
@endsection

@section('comunidad')
    open
@endsection

@section('comunidad-propietarios')
    active
@endsection

@section('pageheader')

    @include('admin.partials.breadadmin')

    <h3 class="page-title"> Comunidad
        <small>Propietarios</small>
    </h3>

    @endsection

    @section('css')
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Propietario <span style="font-weight: bold">{{ $propietario->name }}</span></div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">

                        <tr>
                            <th>Propiedad</th>
                            <th>Información</th>
                        </tr>
                        <tr>
                            <td>{{ $propietario->propiedad->first()->propiedad() }}</td>
                            <td>{{ $propietario->informacion() }}</td>
                        </tr>

                    </table>

                    @include('admin.propietarios.partials.table-show')

                    {{ $movimientos->links() }}

                </div>
            </div>

            <p>
                <a class="btn btn-info" href="{{ url()->previous() }}" role="button">
                    Volver
                </a>
            </p>

        </div>
    </div>

@endsection

@section('scripts')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection