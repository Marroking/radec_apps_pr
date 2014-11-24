@extends('master')

@section('title', 'Error')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1>
                Oops!</h1>
            <h2>
                404 No encontrado
            </h2>
            <div class="error-details">
                Lo siento a ocurrido interno, no se ha encontrado el sitio a donde quieres acceder.
            </div>
            <div class="error-actions">
                <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                    Regresar al Inicio </a>
            </div>
        </div>
    </div>
</div>

@stop
