@extends('master')

@section('title', 'Edit Profile')

@section('content')
	<div class="col-md-4 col-md-offset-4">
		<h3 class="text-success text-center">
			Editar mis datos
		</h3>

		@if (Session::has('flash_message'))
			<div class="form-group">
				<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
			</div>
		@endif

		{{ Form::model($user, ['method' => 'PATCH', 'route' => ['profiles.update', $user->id]]) }}

			<!-- email Field -->
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
				{{ errors_for('email', $errors) }}
			</div>


			<!-- first_name Field -->
			<div class="form-group">
				{{ Form::label('first_name', 'First Name:') }}
				{{ Form::text('first_name', null, ['class' => 'form-control']) }}
				{{ errors_for('first_name', $errors) }}
			</div>

			<!-- last_name Field -->
			<div class="form-group">
				{{ Form::label('last_name', 'Last Name:') }}
				{{ Form::text('last_name', null, ['class' => 'form-control']) }}
				{{ errors_for('last_name', $errors) }}

			</div>

			<!-- Password field -->
			<div class="form-group">
				{{ Form::label('password', 'contraseña:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				<p class="help-block">Si no quieres actualizar la contraseña, deja el campo en blanco.</p>
				{{ errors_for('password', $errors) }}
			</div>

			<!-- Password Confirmation field -->
			<div class="form-group">
				{{ Form::label('password_confirmation', 'Repeat Password:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
			</div>


			<!-- Update Profile Field -->
			<div class="form-group">
				{{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>

@stop