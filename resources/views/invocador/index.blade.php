@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de {{ $invocador['nombre'] }}</div>
                <div class="panel-body">
                    Nombre: {{ $invocador['nombre'] }}<br>
                    Nivel: {{ $invocador['nivel'] }}<br>
                    Imagen Perfil:  <img src="{{ $invocador['imagenPerfil'] }}"><br> 
                    <form action="/partidas">
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

@endsection
