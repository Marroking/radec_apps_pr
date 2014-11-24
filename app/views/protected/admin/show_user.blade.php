@extends('protected.admin.master')

@section('title', 'View Profile')

@section('content')
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-success text-center">
			Perfil de: {{ $user->first_name }}
		</h2>
		<ul style="margin-left:70px;">
			<h4 class="text-primary">Tipo de Cuenta: </h4> {{ $user_group }}
			<h4 class="text-primary">Correo Electronico: </h4>{{ $user->email }}
			<h4 class="text-primary">Nombre: </h4>{{ $user->first_name }}
			<h4 class="text-primary">Apellidos: </h4> {{ $user->last_name }}
			<br>
			<br>
		</ul>
			@if(Sentry::check())
				{{ link_to_route('admin.profiles.edit', 'Editar Perfil', $user->id, ['class' => 'btn btn-primary btn-block']) }}
				{{ link_to('admin/profiles', 'Atras', ['class' => 'btn btn-success btn-block']) }}
			@endif
	</div>

@stop