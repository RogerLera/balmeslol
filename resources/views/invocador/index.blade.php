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
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Estadísticas
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">

                                        @foreach($invocador['ligas'][0] as $atributo)

                                        <div class="col-md-4">
                                            {{$atributo}}
                                            <img class="summoner-icon" src="{{asset('/images/')}}.png">
                                        </div>
                                        @endforeach
                                    </div>
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
