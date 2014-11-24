@extends('protected.admin.master')

@section('title', 'List Users')

@section('content')
	<h2 class="text-success text-center">
		Lista de usuarios
	</h2>
	
	<table class="table table-striped table-bordered table-hover">
		<thead>
      <tr class="success">
        <th>Clave</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Opciones</th>
      </tr>
    </thead>
  	<tbody>
  		@foreach ($users as $user)
    		<tr class="warning">
      		<td>{{ $user->id }}</td>
	        <td>{{ $user->email}}<br>
	        @if ($user->inGroup($admin))
	        <span class="label label-success">{{ 'Admin' }}</span>
	        @endif
	        </td>
	        <td>{{ $user->first_name}}</td>
	        <td>{{ $user->last_name}}</td>
	        <td>{{ link_to_route('admin.profiles.show', 'Ver', $user->id, ['class' => 'btn btn-success']) }}
	        		{{ link_to_route('admin.profiles.edit', 'Editar Perfil', $user->id, ['class' => 'btn btn-primary']) }}</td>
	     </tr>
			@endforeach
  	</tbody>
	</table>

	{{ link_to('admin/', 'Atras', ['class' => 'btn btn-success btn-block']) }}

@stop