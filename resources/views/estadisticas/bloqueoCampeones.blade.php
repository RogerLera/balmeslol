@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Estadísticas de bloqueo de los campeones</div>
                <div class="panel-body">
                    @foreach($estadisticas as $estadistica)
                    <p>ID: {{ $estadistica['id'] }} Nombre: {{ $estadistica['nombre'] }} Imagen: <img src="{{ $estadistica['imagen'] }}"> Estadística: {{ $estadistica['porciento'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
