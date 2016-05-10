@extends('admin.layout')

@section('active-gestion')
    active open
@endsection

@section('gestion')
    open
@endsection

@section('gestion-ingresos')
    active
@endsection

@section('pageheader')

    @include('admin.contabilidad.partials.breadcontabilidad')

    <h3 class="page-title"> Gestión Económica
        <small>Ingresos</small>
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
        <div class="col-md-12">
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Ingresos</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Crear</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        @include('admin.partials.messages')

                                        {!! Form::open(['route' => 'ingresos.store', 'method' => 'POST']) !!}

                                            @include('admin.contabilidad.ingresos.partials.fields')

                                            <button name="crear" value="1" type="submit" class="btn green">Crear</button>
                                            <button name="continuar" value="1" type="submit" class="btn green">Crear y Continuar Añadiendo</button>

                                            <a href="{{ route('ingresos.index') }}" class="btn btn-info">Cancelar</a>

                                        {!! Form::close() !!}

                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
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