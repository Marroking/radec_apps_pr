@extends('master')

@section('title', 'Register')

@section('content')


		<div class="container">
	    <div class="row">
			<div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class=" text-success text-center">Registro de nuevo usuario</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

				    	  	<!-- Id_Collaborator field -->
				    	<div class="form-group">
								{{ Form::text('id_collaborator', null, ['placeholder' => 'Número del colaborador', 'class' => 'form-control'])}}
								{{ errors_for('id_collaborator', $errors) }}
							</div>

							<!-- First name field -->
							<div class="form-group">
								{{ Form::text('first_name', null, ['placeholder' => 'Nombre(s)', 'class' => 'form-control'])}}
								{{ errors_for('first_name', $errors) }}
							</div>

							<!-- Last name field -->
							<div class="form-group">
								{{ Form::text('last_name', null, ['placeholder' => 'Apellidos', 'class' => 'form-control'])}}
								{{ errors_for('last_name', $errors) }}
							</div>
							<div class="form-group">
								{{ Form::text('email', null, ['placeholder' => 'Correo Electrónico', 'class' => 'form-control'])}}
								{{ errors_for('email', $errors) }}
							</div>

							<!-- Password field -->
							<div class="form-group">
								{{ Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control'])}}
								{{ errors_for('password', $errors) }}
							</div>

							<!-- Password Confirmation field -->
							<div class="form-group">
								{{ Form::password('password_confirmation', ['placeholder' => 'Confirmar Contraseña', 'class' => 'form-control'])}}
							</div>

							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Crear Cuenta', ['class' => 'btn btn-lg btn-primary btn-block']) }}
							</div>

				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
			</div>
			<p style="text-align:center">Ya tienes cuenta? <a href="/login">Inicia Sesion</a></p>
			</div>
		</div>
	</div>



@stop