@extends('admin.layout')

@section('active-home')
	active
@endsection

@section('pageheader')
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				{{ link_to('/home', 'Home') }}
				<i class="fa fa-circle"></i>
			</li>
		</ul>
	</div>
	<h3 class="page-title"> Home
		<small>Página principal</small>
	</h3>
@endsection

@section('main-content')
	<div class="note note-info">
		<h3> Gestión de la comunidad de vecinos <span style="font-weight: bold">{{ isset($comunidad) ? $comunidad->nombre : '' }}</span> </h3>
	</div>

	@if($paso_registro == '6' )

		@include('admin.home.index')

	@else

		<div class="alert alert-block alert-info fade in">
			<button type="button" class="close" data-dismiss="alert"></button>
			<h4 class="alert-heading">Bienvenidos!</h4>
			<br>
			<p> Para empezar a trabajar con esta aplicación lo primero que necesitarás será dar de <b>alta tu comunidad de propietarios.</b> </p>
			<p> A continuación se explica cómo dar de alta tu comunidad en <b>6 sencillos pasos:</b> </p>
			<br>
				<p> <b>1. PASO</b> Rellenar los <b>datos principales</b> de tu comunidad: nombre, dirección, imagen... </p>
				<p> <b>2. PASO</b> Crear los <b>tipos de propiedades</b> que existen dentro de la comunidad de vecinos </p>
				<p> <b>3. PASO</b> Dar de alta las <b>propiedades</b> que conforman la comunidad de vecinos </p>
				<p> <b>4. PASO</b> Dar de alta a los <b>propietarios</b> de la comunidad de vecinos </p>
				<p> <b>5. PASO</b> <b>Relacionar</b> los <b>apartamentos</b> con sus respectivos <b>propietarios</b> </p>
				<p> <b>6. PASO</b> <b>Relacionar</b> los <b>garajes</b> con sus respectivos <b>propietarios</b> en caso de existir </p>
			<br>
			<p>
				<a class="btn purple" href="{{ route($url) }}"> Comenzar </a>
			</p>
		</div>

	@endif

@endsection