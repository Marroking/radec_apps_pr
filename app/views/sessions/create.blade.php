@extends('master')

@section('title', 'Login')

@section('content')


	<div class="container">
	    <div class="row">
			<div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class=" text-success text-center ">Inicia Sesion</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'sessions.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<p style="padding:5px" class="bg-success text-success">{{ Session::get('flash_message') }}</p>
							@endif

							@if (Session::has('error_message'))
								<p style="padding:5px" class="bg-danger text-danger">{{ Session::get('error_message') }}</p>
							@endif

				    	  	<!-- Email field -->
							<div class="form-group">
								{{ Form::text('email', null, ['placeholder' => 'Correo Electronico', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('email', $errors) }}
							</div>

				    		<!-- Password field -->
							<div class="form-group">
								{{ Form::password('password', ['placeholder' => 'Contraseña','class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('password', $errors) }}
							</div>

								<div class="form-group">
									{{ Form::label('remember', 'Recordar mi contraseña? ')}}
									{{ Form::checkbox('remember', 'remember') }}
								</div>

							<div class="form-group">
								{{ Form::submit('Iniciar Sesion', ['class' => 'btn btn btn-lg btn-success btn-block']) }}
							</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
			</div>
		</div>
	</div>

@stop