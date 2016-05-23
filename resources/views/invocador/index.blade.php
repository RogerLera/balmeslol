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
                                         <img src="{{ $invocador['imagenPerfil'] }}">
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
                    <div class="row">
                        <div class="col-md-8">
                            {{$invocador['ligas'][0]['liga']}}
                            <form action="/partidas" accept-charset="ISO-8859-1">
                                <input type="hidden" name="nombre" value="{{ $invocador['nombre'] }}">
                                <input type="hidden" name="region" value="{{ $invocador['region'] }}">
                                <input type="submit" value="Historial de Partidas Recientes">
                            </form>
                            <br><br>
                            @foreach($invocador['partidas'] as $jugado)
                                @foreach($jugado as $atributo => $valor)
                                <b>{{ $atributo }}</b> : {{ $valor }}<br>
                                @endforeach
                                <br><br><br>
                            @endforeach
                        </div>
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
