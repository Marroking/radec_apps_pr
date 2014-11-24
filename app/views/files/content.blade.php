@extends('master')

@section('title', '')

@section('content')

  {{
		$listar = null;
		$file_path = opendir(public_path().'/uploads/');

		while ($elemento = readdir($file_path))
		{
			if ($elemento != '.' &&  $elemento != '..') {
				if (is_dir("/uploads/.$elemento"))
				{
					$listar .= "<li><a href='/uploads/$elemento' target='_blank'>$elemento/</a></li>";
				}
				else
				{
					$listar .= "<li><a href='/uploads/$elemento' target='_blank'>$elemento</a></li>";
				}
			}
		}
	}}

	<div class="col-md-10 col-md-offset-1" style="margin-top:50px;">
		<div class="jumbotron">
			<h2 class="text-success text-center">
				Listado de Archivos
			</h2>
			<p>
				Esta es una aplicación para gestionar el acceso de usuarios y la carga de archivos.
			</p>
			<ul>
				{{ $listar }}
				<br>
			{{--	<a href="#" class="btn btn-primary btn-block ">Eliminar</a> --}}
			</ul>
		</div>
	</div>
@stop