@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    <div class="panel-body">
                         <div class="row">
                             <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Inicio</a></li>
                                    <li><a href="{{ url('/campeones') }}">Campeones</a></li>
                                    <li class="active">{{ $campeon['nombre'] }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="splashart">
                            <img src="{{ $campeon['retrato'] }}">
                            <p class="splash-title"><b>{{ $campeon['nombre'] }}</b><br><i>{{ $campeon['titulo'] }}</i></p>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4" >
                                <div class="panel panel-default">
                                    <div class="panel-heading">Estadísticas</div>
                                        <div class="panel-body-min">
                                            <table class="table-condensed">
                                                <tbody>
                                                    {{--*/ $count = 1;  /*--}}
                                                    @foreach($campeon['estadisticas'] as $atributo => $valor)
                                                        @if ($count % 2 == 0)
                                                            <td><b><img src="{{asset('/images/').'/'.str_replace(['á','í','ó',' '],['a','i','o','_'],$atributo) }}.png"> {{ $atributo }}:</b> {{ $valor }}</td>
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <td><b><img src="{{asset('/images/').'/'.str_replace(['á','í','ó',' '],['a','i','o','_'],$atributo) }}.png"> {{ $atributo }}:</b> {{ $valor }}</td>
                                                        @endif
                                                            {{--*/ $count++; /*--}}
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Características</div>
                                        <div class="panel-body-min">
                                            @foreach($campeon['caracteristicas'] as $atributo => $valor)
                                                <label>{{ $atributo }}</label>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-{{ $atributo }}" role="progressbar" aria-valuenow="{{ $valor }}"
                                                  aria-valuemin="0" aria-valuemax="10" style="width:{{ $valor }}0%">
                                                    {{ $valor }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Habilidades</div>
                                        <div class="panel-body-min">
                                            @foreach($campeon['habilidades'] as $atributo => $valor)
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="customborder" src="{{ $valor['Imagen'] }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4>Habilidad: {{  $atributo }}</h4>
                                                            <div class="row">
                                                                 <div class="col-md-12">
                                                                    <h5>{{ $valor['Nombre'] }}</h5>
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>{{ $valor['Descripcion'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="embed-responsive embed-responsive-16by9 customborder videoclass">
                                                        <video controls poster="https://lolstatic-a.akamaihd.net/champion-abilities/images/{{ $valor['Video'] }}.jpg">
                                                            <source src="https://lolstatic-a.akamaihd.net/champion-abilities/videos/mp4/{{ $valor['Video'] }}.mp4" type="video/mp4" />
                                                            <source src="https://lolstatic-a.akamaihd.net/champion-abilities/videos/webm/{{ $valor['Video'] }}.webm" type="video/webm" />
                                                            <source src="https://lolstatic-a.akamaihd.net/champion-abilities/videos/ogv/{{ $valor['Video'] }}.ogv" type="video/ogg" />
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Lore</div>
                                        <div class="panel-body-min">
                                            <p>{{ $campeon['lore'] }}</p>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
