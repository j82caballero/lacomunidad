@extends('admin.layout')

@section('active-juntas')
    active open
@endsection

@section('juntas')
    open
@endsection

@section('juntas-crear')
    active
@endsection

@section('pageheader')

    @include('admin.juntas.partials.breadjunta')

    <h3 class="page-title"> Junta de Vecinos
        <small>Crear</small>
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
                <div class="panel-heading">Junta de Vecinos</div>

                @if(Session::has('alert'))
                    <p class="alert alert-success">
                        {{ Session::get('alert') }}
                    </p>
                @endif

                <div class="panel-body">

                    {!! Form::open(['route' => 'junta.store', 'method' => 'POST']) !!}

                        @include('admin.juntas.partials.fields')

                        <button name="crear" value="1" type="submit" class="btn green">Enviar</button>

                    {!! Form::close() !!}

                </div>
            </div>
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