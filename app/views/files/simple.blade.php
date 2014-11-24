@extends('protected.admin.master')
	@section('title', 'Subir Archivos')
	@stop

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	{{ HTML::style('assets/css/dropzone.css')}}
	{{ HTML::script('assets/js/dropzone.min.js')}}
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	@section('content')	
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
					    	<h3 class=" text-success text-center">Sube tus archivos al servidor</h3>
					 	</div>
					  <div class="panel-body">
					  	@if ($estado == true)
								<div class="alert alert-success" role="alert">
									El archivo se subió correctamente!
								</div>
								@else
									<div class="alert alert-info" role="alert">
										Selecciona un archivo
									</div>
									<p class="text-danger text-center">
										Verifica que no exista un archivo del mismo nombre ya que será reemplazado.
									</p>
							@endif
							<div class=" panel">	
								
								<div style="margin-top:10px;padding:10px;">
									{{Form::open(array(
										'url' => 'files/simple', 
										'files' => true))
									}}
										{{Form::label('file', 'Archivo: ')}}
										{{Form::file('file', array('class' => 'form-group'))}}
										<br>
										{{Form::submit('Subir Archivo', array('class' => 'btn btn-success btn-block'))}}
									{{Form::close()}}
								</div>
							</div>
				    </div>
					</div>
				</div>	
	@stop