@extends('layouts.auth')

@section('htmlheader_title')
    Acceder
@endsection

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Admin</b>LaComunidad</a>
        </div><!-- /.login-logo -->

        @include('auth/partials/errors')

        @if(Session::has('alert'))
            <p class="alert alert-success">
                {{ Session::get('alert') }}
            </p>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Loguese para iniciar sesión</p>
            <form action="{{ url('/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ url('/password/reset') }}">He olvidado mi contraseña</a><br>
                        {{--<a href="{{ url('/register') }}" class="text-center">Registrarse</a>--}}
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                    </div><!-- /.col -->
                </div>
            </form>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

    </body>

@endsection
