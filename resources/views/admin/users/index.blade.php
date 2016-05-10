@extends('admin.layout')

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
                        <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> Nombre Comunidad </div>
                        <div class="profile-usertitle-job"> Dirección </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                    <i class="icon-settings"></i> Configuración </a>
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
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="#">
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input type="text" placeholder="John" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" placeholder="Doe" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Mobile Number</label>
                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Interests</label>
                                                <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Occupation</label>
                                                <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">About</label>
                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Website Url</label>
                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Submit </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        <form action="#">
                                            <table class="table table-light table-hover">
                                                <tr>
                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--end profile-settings-->
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>


    {{-- Modal de introducción en caso de tener que crear la comunidad --}}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Bienvenidos</b></h4>
                </div>
                <div class="modal-body">
                    <p> Para empezar a trabajar con esta aplicación lo primero que necesitarás será dar de <b>alta tu comunidad de propietarios.</b> </p>
                    <p> A continuación se explica cómo dar de alta tu comunidad en <b>4 sencillos pasos:</b> </p>

                    <p> <b>1. PASO</b> Rellenar los <b>datos principales</b> de tu comunidad: nombre, dirección, imagen... </p>
                    <p> <b>2. PASO</b> Dar de alta los <b>apartamentos</b> que conforman la comunidad de vecinos </p>
                    <p> <b>3. PASO</b> Dar de alta a los <b>propietarios</b> de la comunidad de vecinos </p>
                    <p> <b>4. PASO</b> <b>Relacionar</b> los <b>apartamentos</b> con sus respectivos <b>propietarios</b> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @endsection

    @section('scripts')

            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myModal').modal();
        });
    </script>

@endsection