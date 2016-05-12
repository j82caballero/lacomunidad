<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
    <meta name="author" content="Alvarez.is - BlackTie.co">

    <title>AdminLaComunidad</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('home') }}"><b>AdminLaComunidad</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    @if (! $registrado)
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @endif
                @else
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>La<b><a href="#">Comunidad</a></b></h1>
                <h3>La <a href="#">Comunidad</a> es un gestor online
                    para llevar el mantenimiento de una Comunidad de Vecinos.</h3>
                <h3><a href="#">AdminLaComunidad</a> está creado con
                    <a href="http://getbootstrap.com/" target="_blank">Bootstrap 3.3</a> , <a href="https://jquery.com/" target="_blank">jQuery</a> y <a
                            href="https://laravel.com/docs/5.2" target="_blank">Laravel 5.2</a></h3>
                @if (! $registrado)
                    <h3><a href="{{ url('/register') }}" class="btn btn-lg btn-success">Registrarse!</a></h3>
                @else
                    <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success">Login!</a></h3>
                @endif
            </div>
            <div class="col-lg-2">
                <h5>Una plantilla de administración increíble</h5>
                <p>Basado en un tema de Bootstrap</p>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
            </div>
            <div class="col-lg-8">
                <img class="img-responsive" src="{{ asset('imagenes/comunidad/presentacion.png') }}" alt="">
            </div>
            <div class="col-lg-2">
                <br>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                <h5>Impresionante plantilla...</h5>
                <p>... por <a href="#">José Caballero García</a> preparado para usar con Laravel!</p>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<div id="c">
    <div class="container">
        <p>
            <a href="https://github.com/acacha/adminlte-laravel"></a><b>AdminLaComunidad</b></a>. Trabajo de Fin de Grado 2016.
            <strong>Copyright &copy; 2016 </a>.</strong> Creado por <a href="#">José Caballero García</a>.
            <br/>
            Puedes ver el código en <a href="https://github.com/j82caballero/lacomunidad" target="_blank">Github</a> Realizado con Bootstrap 3.3, jQuery y Laravel 5.2
        </p>

    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
