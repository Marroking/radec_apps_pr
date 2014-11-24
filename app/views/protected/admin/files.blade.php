@extends('protected.admin.master')

	@section('title', 'Subir Archivos')
	@endsection
		@section('content')
			<div class="col-md-3">
				<legend> Subir Archivos </legend>
					<div class="btn-group">
						<button type="button" class="btn btn-primary" onclick="$('#upload_modal').modal({backfrop: 'static'});">
							<span class="glyphicon glyphicon-plus-sign"></span>
						</button>
					</div>
			</div>
		@endsection