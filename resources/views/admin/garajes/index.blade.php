@extends('admin.layout')

@section('active-comunidad')
    active open
@endsection

@section('comunidad')
    open
@endsection

@section('comunidad-garajes')
    active
@endsection

@section('pageheader')

    @include('admin.partials.breadadmin')

    <h3 class="page-title"> Comunidad
        <small>Garajes</small>
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
                <div class="panel-heading">Garajes</div>

                @if (Session::has('message'))

                    <p class="alert alert-success">{{ Session::get('message') }}</p>

                @endif

                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('garajes.create') }}" role="button">
                            Crear
                        </a>
                    </p>

                    @include('admin.garajes.partials.table')

                    {{ $propiedades->links() }}

                </div>
            </div>
            <p>
                <a class="btn btn-info" href="{{ url('home') }}" role="button">
                    Continuar
                </a>
            </p>
        </div>
    </div>

    {!! Form::open(['route' => ['garajes.destroy', ':TIPO_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Atención!</h4>
                </div>
                <div class="modal-body">
                    <p id="modal-texto"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {

                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':TIPO_ID', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function (result) {
                    $('#modal-texto').text(result);
                    $('#myModal').modal('show');
                }).fail(function () {
                    $('#modal-texto').text('El garaje no fue eliminado');
                    $('#myModal').modal('show');

                    row.show();
                });
            });
        });
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection