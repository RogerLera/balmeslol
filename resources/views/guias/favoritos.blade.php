@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Guias favoritas</div>
                <div class="panel-body">
                    @if (count($guias) > 0)
                        @foreach($guias as $guias2)
                            @foreach($guias2 as $guia)
                                <div>
                                    <img src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                    <a href="/guias/{{ $guia->id }}"><h4>{{ $guia->guiTitulo }}</h4></a>
                                    <p>{{ $guia->guiNombre }}</p>
                                    <p>{{ $guia->guiVersion }}</p>
                                    <p>{{ $guia->role->rolNombre }}</p>
                                    <p>{{ $guia->user->usuAlias }}</p>
                                    <span class="glyphicon glyphicon-thumbs-up" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 1)"></span>&nbsp;
                                    <span id="meGusta{{ $guia->id }}">{{ $guia->guiPositivo}}</span>
                                    <span class="glyphicon glyphicon-thumbs-down" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 0)"></span>&nbsp;
                                        <span id="noMeGusta{{ $guia->id }}">{{ $guia->guiNegativo}}</span>
                                        @if (isset($guia->favorito->usuId) && Auth::user()->favorito->usuId == Auth::id())
                                            <button id="favorito{{ $guia->id }}" type="button" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')">Borrar favorito</button>
                                        @else
                                            <button id="favorito{{ $guia->id }}" type="button" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')">Añadir favorito</button>
                                        @endif
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        <p>No tienes ninguna guia en favoritos! <a href="{{ url('/guias') }}">Ver guias</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection