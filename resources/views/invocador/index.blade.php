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
                                <li class="active">{{ $invocador['nombre'] }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="summoner-banner">
                                <img src="{{asset('/images/profile-background.png')}}">
                                <div class="row">
                                    <div class="col-md-2">
                                         <img class="summoner-icon" src="{{ $invocador['imagenPerfil'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="summoner-title">
                                            {{ $invocador['nombre'] }}
                                            <br>
                                            Nivel {{ $invocador['nivel'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Puntuación personal
                                </div>
                                <div class="panel-body-stats">
                                    <div class="row">
                                        @if ($invocador['ligas'] != 'unranked')
                                            @foreach($invocador['ligas'] as $liga)
                                                @if ($liga['nombre'] === 'vacio')
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="text-align:center;">Equipo 3v3</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 style="text-align:center;">--</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <img src="{{asset('/images/medals/default') }}.png">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="text-align:center;">--</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="text-align:center;">--</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5 style="text-align:center;">--</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 style="text-align:center;">--</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        @if ($liga['cola'] == "RANKED_TEAM_3x3")
                                                                            <h4 style="text-align:center;">Equipo 3v3</h4>
                                                                        @elseif ($liga['cola'] == "RANKED_SOLO_5x5")
                                                                            <h4 style="text-align:center;">Clasificatoria</h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 style="text-align:center;">{{ $liga['nombre'] }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <img src="{{asset('/images/medals') }}/{{$liga['tier']}} {{$liga['division']}}.png">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="text-align:center;"><b>{{ $liga['tier']}} {{$liga['division'] }}</b></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="text-align:center;">{{ $liga['puntos'] }} puntos</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5 style="text-align:center;">Victorias: {{ $liga['ganadas'] }}</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 style="text-align:center;">Derrotas: {{ $liga['perdidas'] }}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @for($i = 1; $i <= 2; $i++)
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    @if ($i == 1)
                                                                        <h4 style="text-align:center;">Equipo 3v3</h4>
                                                                    @else
                                                                        <h4 style="text-align:center;">Clasificatoria</h4>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;">--</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <img src="{{asset('/images/medals/default') }}.png">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 style="text-align:center;">--</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 style="text-align:center;">--</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5 style="text-align:center;">--</h5>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5 style="text-align:center;">--</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="text-align:center;">Equipo 5v5</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5 style="text-align:center;">--</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img src="{{asset('/images/medals/default') }}.png">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="text-align:center;">--</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="text-align:center;">--</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5 style="text-align:center;">--</h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5 style="text-align:center;">--</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Estadísticas
                                </div>
                                <div class="panel-body-stats scroll">
                                    @foreach($invocador['estadisticas'] as $estadistica)
                                        <table class="table-stats">
                                            <thead>
                                                <tr>
                                                    <th>{{$estadistica['Modo de Juego']}}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Victorias: </td>
                                                <td>{{$estadistica['Victorias']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Derrotas: </td>
                                                <td>{{$estadistica['Derrotas']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Campeones Asesinados: </td>
                                                <td>{{$estadistica['Monstruos Asesinados']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Asistencias: </td>
                                                <td>{{$estadistica['Asistencias']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Torres destruidas: </td>
                                                <td>{{$estadistica['Torres Destruidas']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Subditos Asesinados</td>
                                                <td>{{$estadistica['Subditos Asesinados']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Monstruos Asesinados</td>
                                                <td>{{$estadistica['Monstruos Asesinados']}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form action="/partidas" accept-charset="ISO-8859-1">
                                <input type="hidden" name="nombre" value="{{ $invocador['nombre'] }}">
                                <input type="hidden" name="region" value="{{ $invocador['region'] }}">
                                <input type="submit" value="Historial de Partidas Recientes">
                            </form>
                        </div>
                    </div>
                </div><!--Panel body -->
            </div><!--panel panel-default-->
        </div><!--col-md-10 col-md-offset-1-->
    </div><!--Row-->
</div><!--Container-->

@endsection
