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
                                <li class="active">@lang('messages.Gui-Guias')</li>
                            </ul>
                        </div>
                    </div>
                    @if (count($guias) > 0)
                        @foreach($guias as $guia)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/guias/{{ $guia->id }}"><h4>{{ $guia->guiTitulo }} [{{ $guia->role->rolNombre }}]</h4></a>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Por: {{ $guia->user->usuAlias }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Actualizado: {{$guia->updated_at}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Versíón: {{ $guia->guiVersion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                        <span class="glyphicon glyphicon-thumbs-up" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'meGusta{{ $guia->id }}', 1)"></span>&nbsp;
                                        <span id="meGusta{{ $guia->id }}">{{ $guia->guiPositivo}}</span>
                                        <span class="glyphicon glyphicon-thumbs-down" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'noMeGusta{{ $guia->id }}', 0)"></span>&nbsp;
                                        <span id="noMeGusta{{ $guia->id }}">{{ $guia->guiNegativo}}</span>
                                        @if (isset($guia->favorito->usuId) && $guia->favorito->usuId == Auth::id())
                                            <span id="favorito{{ $guia->id }}" class="glyphicon glyphicon-star-empty" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')"></span>&nbsp;
                                        @else
                                            <span id="favorito{{ $guia->id }}" class="glyphicon glyphicon-star" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')"></span>&nbsp;
                                        @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>@lang('messages.Gui-Noexiste'), <a href="{{ url('/guias/crear') }}">@lang('messages.Gui-Crea')</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
