@extends('protected.admin.master')

@section('title', 'Edit Profile')

@section('content')

	<div class="container">
		<div class="row clearfix">
			<div class="col-md-4 col-md-offset-4">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class=" text-success text-center">Editar los datos del usuario</h3>
				 	</div>
				  <div class="panel-body">
			    	@if (Session::has('flash_message'))
							<div class="form-group">
								<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
							</div>
						@endif
							{{ Form::model($user, ['method' => 'PATCH', 'route' => ['admin.profiles.update', $user->id]]) }}

				<!-- first_name Field -->
				<div class="form-group">
					{{ Form::label('first_name', 'Nombre(s):') }}
					{{ Form::text('first_name', null, ['class' => 'form-control']) }}
					{{ errors_for('first_name', $errors) }}
				</div>

				<!-- last_name Field -->
				<div class="form-group">
					{{ Form::label('last_name', 'Apellidos:') }}
					{{ Form::text('last_name', null, ['class' => 'form-control']) }}
					{{ errors_for('last_name', $errors) }}

				<div class="form-group">
					{{ Form::label('account_type', 'Tipo de cuenta:') }}
					{{ Form::select('account_type', $groups, $user_group, ['class' => 'form-control']) }}
					{{ errors_for('account_type', $errors) }}
				</div>

				<!-- email Field -->
				<div class="form-group">
					{{ Form::label('email', 'Correo Electrónico:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}
					{{ errors_for('email', $errors) }}
				</div>

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
					{{ Form::label('password_confirmation', 'Repite tu contraseña:') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
				</div>

				<!-- Update Profile Field -->
				<div class="form-group">
					{{ Form::submit('Actualizar Perfil', ['class' => 'btn btn-primary btn-block']) }}
					{{ link_to('admin/profiles', 'Atras', ['class' => 'btn btn-success btn-block']) }}
				</div>
							{{ Form::close() }}
				  </div>
			</div>
		</div>
	</div>

@stop