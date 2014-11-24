@extends('master')

@section('title', 'Home')

@section('content')
	<div class="col-md-6 col-md-offset-3" style="margin-top:50px;">
		<div class="jumbotron" style="text-align:center;">
			<h2 class="text-success text-center">
				Radec S.A de C.V
			</h2>
			<p class="text-info">
				Esta es una aplicación para gestionar el acceso de usuarios y la carga de archivos
			</p>

			@if (!Sentry::check())
			<p>
				<a href="/login" class="btn btn-success btn-lg btn-block" role="button">Inicia Sesión</a> 
					<br> 
				<a href="/register" class="btn btn-primary btn-lg btn-block" role="button">Registrate!</a>
			</p>
			@endif
		</div>
	</div>
@stop