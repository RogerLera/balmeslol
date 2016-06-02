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
                                <li><a href="{{ url('/guias/todas') }}">@lang('messages.Gui-Guias')</a></li>
                                <li class="active">@lang('messages.Gui-Guias') {{ $guia->camNombre }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1>{{ $guia->guiTitulo }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">@lang('messages.Gui-Contenido')</div>
                                <div class="panel-body-min">
                                    <ol>
                                        <li>@lang('messages.Hechizos')</li>
                                        <li>@lang('messages.Gui-Runas')</li>
                                        <li>@lang('messages.Inf-Habilidades')</li>
                                        <li>@lang('messages.Objetos')</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="guide">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img alt="{{ $guia->camNombre }}" class="guide-icon" src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                    </div>
                                    <div class="col-md-7">
                                            <p>{{ $guia->camNombre }} [{{ $guia->role->rolNombre }}]</p>
                                            <p>@lang('messages.Gui-Version'): {{ $guia->guiVersion }}</p>
                                            <p>@lang('messages.Gui-Por'): <a href="/perfil/{{$guia->usuId}}">{{ $guia->user->usuAlias }}</a></p>
                                            <p>@lang('messages.Gui-Actualizado'): {{$guia->updated_at}}</p>
                                    </div>
                                    <div class="col-md-2" style="margin-top: 40px;">
                                        <span class="fa fa-thumbs-o-up fa-2x" style="color:green;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 1)"></span>&nbsp;
                                        <span id="meGusta{{ $guia->id }}" style="color:green;">{{ $guia->guiPositivo}}</span>
                                        <span class="fa fa-thumbs-o-down fa-2x" style="color:red;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 0)"></span>&nbsp;
                                        <span id="noMeGusta{{ $guia->id }}" style="color:red;">{{ $guia->guiNegativo}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion">
                                <!-- Hechizos -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                <i style="color:white;" class="fa fa-chevron-down" aria-hidden="false"></i>
                                            </a>
                                            @lang('messages.Hechizos')</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div>
                                            <textarea class="form-control visualizarGuia" name="guiHechizos">{{ $guia->guiHechizos }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Runas -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                <i style="color:white;" class="fa fa-chevron-down" aria-hidden="false"></i>
                                            </a>
                                            @lang('messages.Gui-Runas')
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div>
                                            <textarea class="form-control visualizarGuia" name="guiRunas">{{ $guia->guiRunas }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Habilidades -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                <i style="color:white;" class="fa fa-chevron-down" aria-hidden="false"></i>
                                            </a>
                                            @lang('messages.Inf-Habilidades')
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse in">
                                        <div>
                                            <textarea class="form-control visualizarGuia" name="guiHabilidades">{{ $guia->guiHabilidades }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Objetos -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                <i style="color:white;" class="fa fa-chevron-down" aria-hidden="false"></i>
                                            </a>
                                            @lang('messages.Objetos')
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse in">
                                        <div>
                                            <textarea class="form-control visualizarGuia" name="guiObjetos">{{ $guia->guiObjetos }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
