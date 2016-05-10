@extends('layouts.auth')

@section('htmlheader_title')
    Registro
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LaComunidad</a>
        </div>

        @include('auth/partials/errors')

        <div class="register-box-body">
            <p class="login-box-msg">Registro administrador</p>
            <form action="{{ url('/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" class="form-control" placeholder="DNI" name="dni" value="{{ old('dni') }}"/>
                    <span class="glyphicon form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" class="form-control" placeholder="Teléfono" name="telefono" value="{{ old('telefono') }}"/>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repite password" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <input type="hidden" class="form-control" name="observaciones"/>

                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ url('/login') }}" class="text-center">Ya estoy registrado </a>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')

    </body>

@endsection
