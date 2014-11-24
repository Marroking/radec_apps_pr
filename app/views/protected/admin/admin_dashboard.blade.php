@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

	@if (Session::has('flash_message'))
			<p>{{ Session::get('flash_message') }}</p>
	@endif


	<div class="jumbotron">
		<h1>Página del Adminsitrador</h1>
		<p>Este apartado es sólo para los Adminsitradores el sitio</p>
	</div>


@stop