@extends('protected.admin.master')
	@section('title', 'Subir Archivos')
	@stop

	@section('content')	
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-folder-open">
									Archivos
							</span>
						</div>
						<div class="panel-body">
							<div class="alert alert-info" role="alert">
								Listando Archivos {{ Auth::user()->username }} 
								<i class="fa fa-files-o"></i>
							</div>
							@if (Session::has('estado'))
								<div class="alert alert-success">
									<button type="button" class="close" data-dimiss="alert">x</button>
									Archivo Borrado
								</div>
							@endif
						</div>

						<ul class="List-group">
							@foreach($files as $file)
							<div class="row">
								<div class="col-md-8">
									@if ($file->clientOriginalExtension == 'py') 
										 <a href="{{url('files/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-info">
										@elsif ($file->clientOriginalExtension == 'c') 
										<a href="{{url('files/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-danger">
											@elsif ($file->clientOriginalExtension == 'h') 
												<a href="{{url('files/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-info">
												@else
													<a href="{{url('files/contentfile',array($file->id, $secure = null))}}" class="list-group-item list-group-item-warning">
									@endif

									<i class="fa fa"></i>
									<span class="badge">
										{{
											number_format(doubleval($file->size),2,'.','KB')
										}}
									</span>
										{{
											$file->normalName
										}}
										</a>
								</div>

								<div class="col-md-4">
									<a href="{{url('files/deleteFile',array($file->id,$secure = null))}}">
										<button type="button" data-togle="tooltip" data-placement="top" title="Borrar" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
									</a>
									<a href="{{url('files/contentFile', array($file->id, $secure = null))}}">
										<button type="button" data-togle="tooltip" data-placement="top" title="Borrar" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
									</a>

									<button class="btn btn-warning" data-togle="modal" data-target="{{'#myModal'.$file->id}}">
										<i class="fa fa-files-o"></i>
									</button>
							</div>

							<div class="modal fade" id="{{'myModal'.$file->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" type="button" data-demiss="modal"><span aria-hidden="true" >&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="myModalLabel"><i class="fa fa-files-o"></i>Reemplazar Archivo {{ $file->normalName }}
											</h4>
										</div>
										<div class="modal-body">
											{{ Form::open(array(
												'action' => array('FilesController@postReplaceFiles', $file->id),
												'files' => true
												))}}

												<div class="alert alert-warning" role="alert"> Si reemplazas el archivo ya no podrás recuperarlo
												</div>
												{{Form::label('file', 'Archivo:')}}
												{{Form::file('file', array('class' => 'btn btn-warning'))}}
										</div>	
										<div class="modal-footer">
											<button class="btn btn-default" type="button" data-dimiss="modal">
												Cerrar												
											</button>
												{{Form::submit('Reemplazar', array('class' => 'btn btn-warning'))}}
											{{ Form::close()}}
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	@stop