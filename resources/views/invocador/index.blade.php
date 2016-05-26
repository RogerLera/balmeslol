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
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Puntuación personal
                                </div>
                                <div class="panel-body-min">
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
                                                                        <img class="summoner-icon" src="{{asset('/images/medals/default') }}.png">
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
                                                                        <img class="summoner-icon" src="{{asset('/images/medals') }}/{{$liga['tier']}} {{$liga['division']}}.png">
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
                                                                    <img class="summoner-icon" src="{{asset('/images/medals/default') }}.png">
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
                                                            <img class="summoner-icon" src="{{asset('/images/medals/default') }}.png">
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
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Estadísticas
                                </div>
                                <div class="panel-body-min">
                                    @foreach($invocador['estadisticas'] as $estadistica)
                                        <table class="table-bordered">
                                            <tr>
                                            <th>{{$estadistica['Modo de Juego']}}</th>
                                            </tr>
                                            <tr>
                                                <td>{{$estadistica['Total Torres Destruidas']}}</td>
                                                <td></td>
                                            </tr>

                                        </table>
                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Panel body -->
            </div><!--panel panel-default-->
        </div><!--col-md-10 col-md-offset-1-->
    </div><!--Row-->
</div><!--Container-->

@endsection
