@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Historial de partidas más recientes</div>
                <div class="panel-body">
                    <a href="/invocador?nombre={{ $_GET['nombre'] }}&region={{ $_GET['region'] }}">Volver al perfil</a>
                    <br><br>
                    @foreach($partidas as $partida)
                    
                        Tipo:{{ $partida['Tipo'] }}<br><br>
                        
                        <b>EQUIPO 1</b><br>
                        {{ $partida['Resultado']['Equipo 1'] }}<br>
                        @foreach($partida['Equipo 1'] as $p)
                            @if(isset($p['Nombre']))
                                Nombre: {{ $p['Nombre'] }}<img width='25' height='25' src="{{ $p['imagenInvocador'] }}"> 
                            @endif
                            Campeon: {{ $p['Campeon'] }}<img width='25' height='25' src="{{ $p['imagenCampeon'] }}">  KDA:{{ $p['KDA'] }} KDA Ratio:{{ $p['Ratio KDA'] }} CS: {{ $p['CS'] }}<br>
                        @endforeach                        
                        
                        @if(isset($partida['Ban']['Equipo 1'][0]['Campeon']))
                            <br>BANS:<br>
                            @foreach($partida['Ban']['Equipo 1'] as $b)
                                Campeon: {{ $b['Campeon'] }}<img width='25' height='25' src="{{ $b['imagenCampeon'] }}">
                            @endforeach
                        @endif
                        <br><br>
                        
                        
                        <b>EQUIPO 2</b><br>
                        {{ $partida['Resultado']['Equipo 2'] }}<br>
                        @foreach($partida['Equipo 2'] as $p)
                            @if(isset($p['Nombre']))
                                Nombre: {{ $p['Nombre'] }}<img width='25' height='25' src="{{ $p['imagenInvocador'] }}"> 
                            @endif
                            
                            Campeon: {{ $p['Campeon'] }}<img width='25' height='25' src="{{ $p['imagenCampeon'] }}">  KDA:{{ $p['KDA'] }} KDA Ratio:{{ $p['Ratio KDA'] }} CS: {{ $p['CS'] }}<br>
                            
                        @endforeach
                                                
                        @if(isset($partida['Ban']['Equipo 2'][0]['Campeon']))
                            <br>BANS:<br>
                            @foreach($partida['Ban']['Equipo 2'] as $b)
                                Campeon: {{ $b['Campeon'] }}<img width='25' height='25' src="{{ $b['imagenCampeon'] }}">
                            @endforeach
                        @endif
                        <br><br><br><br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
