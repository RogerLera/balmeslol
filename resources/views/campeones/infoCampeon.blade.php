@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $campeon['nombre'] }}, {{ $campeon['titulo'] }}</div>
                <div class="panel-body-min">
                    <div class="splashart"> 
                        <img src="{{ $campeon['retrato'] }}"> 
                        <p class="splash-title"><b>{{ $campeon['nombre'] }}</b><br>{{ $campeon['titulo'] }}</p>
                    </div>
                    <br><br>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#lore">Lore</a></li>
                        <li><a data-toggle="tab" href="#caracteristicas">Características</a></li>
                        <li><a data-toggle="tab" href="#estadisticas">Estadísticas</a></li>
                        <li><a data-toggle="tab" href="#habilidades">Habilidades</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="lore" class="tab-pane fade in active">
                            <h3>Lore</h3>
                            <p>{{ $campeon['lore'] }}</p>
                        </div>
                        <div id="caracteristicas" class="tab-pane fade">
                            <h3>Características</h3>
                            @foreach($campeon['caracteristicas'] as $atributo => $valor)
                                <p><b>{{ $atributo }}: </b>{{ $valor }}</p>
                            @endforeach
                        </div>
                        <div id="estadisticas" class="tab-pane fade">
                            <h3>Estadísticas</h3>
                            @foreach($campeon['estadisticas'] as $atributo => $valor)
                                <p><b>{{ $atributo }}: </b>{{ $valor }}</p>
                            @endforeach
                        </div>
                        <div id="habilidades" class="tab-pane fade">
                            <h3>Habilidades</h3>
                            @foreach($campeon['habilidades'] as $atributo => $valor)
                                <h4>{{  $atributo }}</h4>
                                <p>{{ $valor['Nombre'] }}</p>
                                <p>{{ $valor['Descripcion'] }}</p>
                                <p><img src="{{ $valor['Imagen'] }}"></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
