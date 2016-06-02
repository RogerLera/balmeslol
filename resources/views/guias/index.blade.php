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
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/guias/crear') }}" class="btn btn-success" role="button">
                                <i class="fa fa-btn fa-sign-in"></i> @lang('messages.Gui-Crear')
                            </a>

                        </div>
                    </div>
                            <br>
                    @if (count($guias) > 0)
                        @foreach($guias as $guia)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="guide">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img class="guide-icon" src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-2">
                                                        <span class="fa fa-thumbs-o-up fa-2x" style="color:green;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'meGusta{{ $guia->id }}', 1)"></span>&nbsp;
                                                        <span id="meGusta{{ $guia->id }}" style="color:green;">{{ $guia->guiPositivo}}</span>
                                                        <span class="fa fa-thumbs-o-down fa-2x" style="color:red;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 'noMeGusta{{ $guia->id }}', 0)"></span>&nbsp;
                                                        <span id="noMeGusta{{ $guia->id }}" style="color:red;">{{ $guia->guiNegativo}}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div clas="col-md-12">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <a href="/guias/{{ $guia->id }}"><h4>{{ $guia->guiTitulo }} [{{ $guia->role->rolNombre }}]</h4></a>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>@lang('messages.Gui-Por'): <a href="/perfil/{{$guia->usuId}}">{{ $guia->user->usuAlias }}</a></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <p>@lang('messages.Gui-Actualizado'): {{$guia->updated_at}}</p>
                                                    </div>

                                                    <div class="col-md-3">

                                                    @if (isset($guia->favorito->usuId) && $guia->favorito->usuId == Auth::id())
                                                        <img id="favorito{{ $guia->id }}" style="width:30%;" src="{{asset('/images/remove-favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')">
                                                    @else
                                                        <img id="favorito{{ $guia->id }}" style="width:30%;" src="{{asset('/images/favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')">
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>@lang('messages.Gui-Version'): {{ $guia->guiVersion }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
<<<<<<< HEAD
                                </div>
=======



                                    <span class="glyphicon glyphicon-thumbs-up" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 1)"></span>&nbsp;
                                    <span id="meGusta{{ $guia->id }}">{{ $guia->guiPositivo}}</span>
                                    <span class="glyphicon glyphicon-thumbs-down" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 0)"></span>&nbsp;
                                        <span id="noMeGusta{{ $guia->id }}">{{ $guia->guiNegativo}}</span>
                                        @if (isset($guia->favorito->usuId) && $guia->favorito->usuId == Auth::id())
                                            <span id="favorito{{ $guia->id }}" class="glyphicon glyphicon-star" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')"></span>&nbsp;
                                        @else
                                            <span id="favorito{{ $guia->id }}" class="glyphicon glyphicon-star-empty" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')"></span>&nbsp;
                                        @endif


>>>>>>> origin/master
                            </div>
                        @endforeach
                    @else
                        <p>@lang('messages.Gui-Noexiste'), <a href="{{ url('/guias/crear') }}">@lang('messages.Gui-Crea')</a></p>
                    @endif
                </div><!--Panel body-->
            </div><!--Panel body-->
        </div><!--COl-md-10-->
    </div><!--Row-->
</div><!--Container-->
@endsection
