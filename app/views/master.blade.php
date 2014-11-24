<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title') - Radec S.A de C.V - </title>
	<meta name="description" content="">
	<meta name="author" content="">
	{{ HTML::style('assets/css/style.css')}}
	{{ HTML::style('assets/css/bootstrap-theme.css')}}
	{{ HTML::style('assets/css/bootstrap.css')}}
	{{ HTML::style('assets/css/dropzone.css')}}
	{{ HTML::script('assets/js/bootstrap.js')}}
	{{ HTML::script('assets/js/bootstrap.min.js')}}
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-inverse" role="navigation">
		  <div class="container-fluid">
		  	<div class="col-md-2">
			    <div class="container">
						<div class="row clearfix">
							<div class="col-md-12 column">
								<div class="row clearfix">
									<div class="col-md-3 column">
										{{ HTML::image('images/radec_logo.jpg', "Imagen no encontrada", array('id' => 'radec_logo', 'title' => 'RADEC S.A de C.V')) }}
									</div>
									<div class="col-md-9 column">
									<div class="navbar-header">
							      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
							    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
			  </div>
			  <div class="col-md-4"> 	
			  </div>
			  <div class="col-md-6">
			    <div class="collapse navbar-collapse nav navbar-nav navbar-right">
			      <ul class="nav navbar-nav">
			        <li class="{{ set_active('/') }}"><a href="/">Inicio</a></li>
			      	@if (!Sentry::check())
							@else
								<li class="{{ set_active('profiles') }}"><a href="/profiles/{{Sentry::getUser()->id}}">Mi Perfil</a></li>
								<li class="{{ set_active_admin('standardUser/files') }}"><a href="/standardUser/files/simple">Subir Archivos</a></li>
								<li class="{{ set_active_admin('standardUser/files') }}"><a href="/files/content">Listado de Archivos</a></li>
								<li><a href="/logout">Cerrar Sesion</a></li>
							@endif
			      </ul>
			    </div>
			  </div>
		  </div><!-- /.container-fluid -->
		</nav>
	</header>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>