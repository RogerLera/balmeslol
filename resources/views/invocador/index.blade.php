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
                                <li><a href="{{ url('/') }}">@lang('messages.Inicio')</a></li>
                                <li class="active">@lang('messages.Inv-Titulo')</li>
                            </ul>
                        </div>
                    </div>
                    @if ($invocador == "Empty")
                        <div class="alert alert-danger" role="alert">
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width:30%;" src="{{asset('/images/alertwarning') }}.png">
                                </div>
                                <div class="col-md-10">
                                    <p>@lang('messages.Inv-Error')</p>
                                </div>
                            </div>
                        </div>
                    @else
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
                                                @lang('messages.Inv-Nivel') {{ $invocador['nivel'] }}
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
                                        @lang('messages.Inv-Puntuacion')
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
                                                                            <h4 style="text-align:center;">@lang('messages.Inv-Eq3')</h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 style="text-align:center;">--</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <img class="medal" src="{{asset('/images/medals/default') }}.png">
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
                                                                                <h4 style="text-align:center;">@lang('messages.Inv-Eq3')</h4>
                                                                            @elseif ($liga['cola'] == "RANKED_SOLO_5x5")
                                                                                <h4 style="text-align:center;">@lang('messages.Inv-Clasif')</h4>
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
                                                                            <img class="medal" src="{{asset('/images/medals') }}/{{$liga['tier']}} {{$liga['division']}}.png">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4 style="text-align:center;"><b>{{ $liga['tier']}} {{$liga['division'] }}</b></h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4 style="text-align:center;">{{ $liga['puntos'] }} @lang('messages.Inv-puntos')</h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 style="text-align:center;">@lang('messages.Inv-Victorias'): {{ $liga['ganadas'] }}</h5>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h5 style="text-align:center;">@lang('messages.Inv-Derrotas'): {{ $liga['perdidas'] }}</h5>
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
                                                                            <h4 style="text-align:center;">@lang('messages.Inv-Eq3')</h4>
                                                                        @else
                                                                            <h4 style="text-align:center;">@lang('messages.Inv-Clasif')</h4>
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
                                                                        <img class="medal" src="{{asset('/images/medals/default') }}.png">
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
                                                                <h4 style="text-align:center;">@lang('messages.Inv-Eq5')</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 style="text-align:center;">--</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img class="medal" src="{{asset('/images/medals/default') }}.png">
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
                                        @lang('messages.Inv-Est')
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
                                                    <td>@lang('messages.Inv-Victorias'): </td>
                                                    <td>{{$estadistica['Victorias']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-Derrotas'): </td>
                                                    <td>{{$estadistica['Derrotas']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-CampAses'): </td>
                                                    <td>{{$estadistica['Monstruos Asesinados']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-Asistencias'): </td>
                                                    <td>{{$estadistica['Asistencias']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-Torres'): </td>
                                                    <td>{{$estadistica['Torres Destruidas']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-Cs')</td>
                                                    <td>{{$estadistica['Subditos Asesinados']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.Inv-Monstruos')</td>
                                                    <td>{{$estadistica['Monstruos Asesinados']}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!--row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @lang('messages.Inv-Historial')
                                    </div>
                                    <div class="panel-body-min">
                                         @foreach($invocador['partidas'] as $partida)
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h6 class="game-title">{{$partida['Tipo']}} - {{$partida['Resultado']}} - {{$partida['Duracion']}} @lang('messages.Inv-minutos')</h6>
                                                </div>
                                                 @if ($partida['Resultado'] == "VICTORIA")
                                                    <div class="panel-body-win">
                                                 @else
                                                    <div class="panel-body-lose">
                                                 @endif
                                                        <div class="row">
                                                            <div class="col-md-2" style="margin-top:2%">
                                                                <a href="/campeones/{{ $partida['CampeonId'] }}"> <img class="champ-played" src="{{$partida['CampeonImg']}}"></a>
                                                                 <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a href="/campeones/{{ $partida['CampeonId'] }}"><p class="champ-played-name">{{$partida['CampeonNombre']}}</p></a>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:5%">
                                                                <p class="champ-played-text">@lang('messages.Inv-Nivel') {{$partida['Nivel']}}</p>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="champ-played-text">{{$partida['KDA']}} @lang('messages.Inv-KDA')</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="champ-played-text">{{$partida['Ratio KDA']}} @lang('messages.Inv-KDAratio')</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:2%">
                                                                 <p class="champ-played-text">{{$partida['Oro']}} <img src="{{asset('/images/coinicon.png')}}"></p>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                         <p class="champ-played-text">{{$partida['CS']}} <img src="{{asset('/images/creepicon.png')}}"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                         @foreach($partida['Items'] as $item)
                                                                        <a href="/objetos/{{ $item['Id'] }}"><img class="mini-champ" src="{{$item['Imagen']}}"></a>
                                                                         @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2" style="margin-top:2%">
                                                                <a href="/hechizos"><img class="mini-spells" src="{{$partida['Hechizo1']}}"></a>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a href="/hechizos"><img class="mini-spells" src="{{$partida['Hechizo2']}}"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                 @foreach($partida['Equipo 1'] as $equipo)
                                                                    <div class="row">
                                                                         <div class="col-md-12 summoner-link">
                                                                            <a href="/invocador?nombre={{$equipo['InvocadorId']}}&region={{$partida['Region']}}"><img class="mini-champ" src="{{$equipo['Imagen']}}"></a><span class="champ-played-text"> <a href="/invocador?nombre={{$equipo['InvocadorId']}}&region={{$partida['Region']}}">{{$equipo['Nombre']}}</a></span>
                                                                        </div>
                                                                     </div>
                                                                 @endforeach
                                                            </div>
                                                            <div class="col-md-2">
                                                                 @foreach($partida['Equipo 2'] as $equipo)
                                                                     <div class="row">
                                                                         <div class="col-md-12 summoner-link">
                                                                            <a href="/invocador?nombre={{$equipo['InvocadorId']}}&region={{$partida['Region']}}"><img class="mini-champ" src="{{$equipo['Imagen']}}"></a><span class="champ-played-text"> <a href="/invocador?nombre={{$equipo['InvocadorId']}}&region={{$partida['Region']}}">{{$equipo['Nombre']}}</a></span>
                                                                        </div>
                                                                     </div>
                                                                 @endforeach
                                                            </div>
                                                        </div><!--Row-->
                                                    </div><!--Panel body-->
                                            </div><!--Panel default-->
                                         @endforeach
                                    </div><!--panel-body-min-->
                                </div><!--panel panel-default-->
                            </div><!--col-md-12-->
                        </div><!--Row-->
                    @endif
                </div><!--Panel body -->
            </div><!--panel panel-default-->
        </div><!--col-md-10 col-md-offset-1-->
    </div><!--Row-->
</div><!--Container-->

@endsection
