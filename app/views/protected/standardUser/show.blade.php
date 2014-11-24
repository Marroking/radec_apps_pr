@extends('master')

@section('title', 'View Profile')

@section('content')
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-success text-center">
			Perfil de: {{ $user->first_name }}
		</h2>
		<ul style="margin-left:70px;">
			<h4 class="text-primary">Correo Electronico: </h4> {{ $user->email }}
			<h4 class="text-primary">Nombre(s): </h4> {{ $user->first_name }}
			<h4 class="text-primary">Apellidos: </h4> {{ $user->last_name }}
		</ul>
			@if(Sentry::check())
				{{ link_to_route('profiles.edit', 'Editar tu perfil', $user->id, ['class' => 'btn btn-primary btn-block']) }}
			@endif
	</div>

@stop