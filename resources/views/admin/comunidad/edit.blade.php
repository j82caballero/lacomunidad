@extends('admin.layout')

@section('active-comunidad')
    active open
@endsection

@section('comunidad')
    open
@endsection

@section('comunidad-datos')
    active
@endsection

@section('pageheader')

    @include('admin.partials.breadadmin')

    <h3 class="page-title"> Comunidad
        <small>Editar</small>
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
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{ asset($comunidad->image) }}" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="{{ route('comunidad.index') }}">
                                    <i class="icon-settings"></i> Volver </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Comunidad</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Datos</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        {{-- Datos para crear la comunidad --}}
                                        @include('admin.comunidad.partials.messages')

                                        {!! Form::model($comunidad, ['route' => ['comunidad.update', $comunidad->id], 'method' => 'PUT', 'files' => 'true']) !!}

                                            @include('admin.comunidad.partials.fields')

                                            <button type="submit" class="btn btn-info">Actualizar</button>

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