@extends('admin.layout')

@section('active-comunidad')
    active open
@endsection

@section('comunidad')
    open
@endsection

@section('comunidad-propiedades')
    active
@endsection

@section('pageheader')

    @include('admin.partials.breadadmin')

    <h3 class="page-title"> Propiedades
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
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Propiedades</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Editar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        @include('admin.partials.messages')

                                        {!! Form::model($propiedad, ['route' => ['propiedades.update', $propiedad->id], 'method' => 'PUT']) !!}

                                            @include('admin.propiedades.partials.fields')

                                            <button type="submit" class="btn green">Actualizar</button>
                                            <a href="{{ route('propiedades.index') }}" class="btn btn-info">Cancelar</a>


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