@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $campeon['nombre'] }}, {{ $campeon['titulo'] }}</div>
                <div class="panel-body">
                    <h4>Lore</h4>
                    <p>{{ $campeon['lore'] }}</p>
                    <h4>Características</h4>
                    @foreach($campeon['caracteristicas'] as $atributo => $valor)
                        <p><b>{{ $atributo }}: </b>{{ $valor }}</p>
                    @endforeach
                    <h4>Estadísticas</h4>
                    @foreach($campeon['estadisticas'] as $atributo => $valor)
                        <p><b>{{ $atributo }}: </b>{{ $valor }}</p>
                    @endforeach
                    <h4>Habilidades</h4>
                    @foreach($campeon['habilidades'] as $atributo => $valor)
                        <h4>{{  $atributo }}</h4>
                        <p>{{ $valor['Nombre'] }}</p>
                        <p>{{ $valor['Descripcion'] }}</p>
                        <p>{{ $valor['Imagen'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
