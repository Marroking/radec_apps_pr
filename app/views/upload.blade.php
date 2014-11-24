<!DOCTYPE html>
<html>
<head>
	<title>Subiendo Archivos</title>
		{{ HTML::style('assets/css/bootstrap.css')}}
		{{ HTML::style('css/home.css')}}
		{{ HTML::script('assets/js/bootstrap.js')}}
		{{ HTML::script('jquery.js')}}
</head>
<body>
	<div class="container">
			<div class="row">
				<h1 class="text-center heading">
						Subiendo tus archivos
				</h1>
				<br>
				<div class="col-md-6">
					{{ Form::open(array('url' => 'add', 'files' => true )) }}
						{{ Form::file('file') }}
						<br>
						{{ Form::submit('Subir', array('class' => 'btn btn-primary')); }}
					{{ Form::close() }}
				</div>
			</div>
	</div>
</body>
</html>