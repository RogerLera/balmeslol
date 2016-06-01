@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Guias</div>
                <div class="panel-body">
                    @if (count($guias) > 0)
                        @foreach($guias as $guia)
                            <div>
                                <img src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                <a href="/guias/{{ $guia->id }}"><h4>{{ $guia->guiTitulo }}</h4></a>
                                <p>{{ $guia->guiNombre }}</p>
                                <p>{{ $guia->guiVersion }}</p>
                                <p>{{ $guia->role->rolNombre }}</p>
                                <p>{{ $guia->user->usuAlias }}</p>
                                    <span class="glyphicon glyphicon-thumbs-up" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'meGusta{{ $guia->id }}', 1)"></span>&nbsp;
                                    <span id="meGusta{{ $guia->id }}">{{ $guia->guiPositivo}}</span>
                                    <span class="glyphicon glyphicon-thumbs-down" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'noMeGusta{{ $guia->id }}', 0)"></span>&nbsp;
                                    <span id="noMeGusta{{ $guia->id }}">{{ $guia->guiNegativo}}</span>
                                    @if (isset($guia->favorito->usuId) && $guia->favorito->usuId == Auth::id())
                                        <button id="favorito{{ $guia->id }}" type="button" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')">Borrar favorito</button>
                                    @else
                                        <button id="favorito{{ $guia->id }}" type="button" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')">Añadir favorito</button>
                                    @endif
                            </div>
                        @endforeach
                    @else
                        <p>No existe ninguna guia! <a href="{{ url('/guias/crear') }}">Crea una guia!</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
