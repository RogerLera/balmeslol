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
                                @if ($aMostrar == 'todas')
                                    <li class="active">@lang('messages.Gui-Guias')</li>
                                @elseif ($aMostrar == 'usuario')
                                    <li class="active">@lang('messages.Gui-Misguias')</li>
                                @endif
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
                    @if ($aMostrar == 'usuario')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('messages.Gui-Creadas')
                                </div>
                                <div class="panel-body-min">
                    @endif
                                    @if (count($guias) > 0)
                                        @foreach($guias as $guia)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="guide">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img alt="{{ $guia->camNombre }}" class="guide-icon img-responsive" src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                                                <div class="row">
                                                                    <div class="col-md-10 col-md-offset-2">
                                                                        <span class="fa fa-thumbs-o-up fa-2x" style="color:green;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 1)"></span>&nbsp;
                                                                        <span id="meGusta{{ $guia->id }}" style="color:green;">{{ $guia->guiPositivo}}</span>
                                                                        <span class="fa fa-thumbs-o-down fa-2x" style="color:red;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 0)"></span>&nbsp;
                                                                        <span id="noMeGusta{{ $guia->id }}" style="color:red;">{{ $guia->guiNegativo}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div clas="col-md-12">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
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
                                                                        @if ($guia->usuId != Auth::id())
                                                                            @if (isset($guia->favorito->usuId) && $guia->favorito->usuId == Auth::id())
                                                                                <img class="guide-favorite img-responsive" alt="remove-favorite_button" id="favorito{{ $guia->id }}" src="{{asset('/images/remove-favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')">
                                                                            @else
                                                                                <img class="guide-favorite img-responsive" alt="favorite_button" id="favorito{{ $guia->id }}" src="{{asset('/images/favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')">
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p>@lang('messages.Gui-Version'): {{ $guia->guiVersion }}</p>
                                                                    </div>
                                                                </div>
                                                                @if ($guia->usuId == Auth::id() || Auth::id() == 1)
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/guias/') }}/{{$guia->id}}">
                                                                                {!! csrf_field() !!}
                                                                                {{ method_field('DELETE') }}
                                                                                <button type="submit" class="btn btn-info">
                                                                                    @lang('messages.Gui-Borrar')
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach
                                    @else
                                        <p>@lang('messages.Gui-Noexiste'), <a href="{{ url('/guias/crear') }}">@lang('messages.Gui-Crea')</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!--Row-->
                    @if ($aMostrar == 'usuario')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Guías favoritas
                                    </div>
                                    <div class="panel-body-min">
                                        @if (count($guiasFav) > 0)
                                            @foreach($guiasFav as $guia)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="guide">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img alt="{{ $guia->camNombre }}" class="guide-icon img-responsive" src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                                                    <div class="row">
                                                                        <div class="col-md-10 col-md-offset-2">
                                                                            <span class="fa fa-thumbs-o-up fa-2x" style="color:green;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 1)"></span>&nbsp;
                                                                            <span id="meGusta{{ $guia->id }}" style="color:green;">{{ $guia->guiPositivo}}</span>
                                                                            <span class="fa fa-thumbs-o-down fa-2x" style="color:red;" onclick="votacion({{ $guia->id }}, {{ Auth::id() }}, 0)"></span>&nbsp;
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
                                                                            <img class="guide-favorite img-responsive" alt="remove-favorite_button" id="favorito{{ $guia->id }}" src="{{asset('/images/remove-favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'DELETE')">
                                                                        @else
                                                                            <img class="guide-favorite img-responsive" alt="favorite_button" id="favorito{{ $guia->id }}" src="{{asset('/images/favorite_button.png') }}" onclick="favorito({{ $guia->id }}, {{ Auth::id() }}, this.id, 'POST')">
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p>@lang('messages.Gui-Version'): {{ $guia->guiVersion }}</p>
                                                                        </div>
                                                                    </div>
                                                                    @if ($guia->usuId == Auth::id() || Auth::id() == 1)
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/guias/') }}/{{$guia->id}}">
                                                                                {!! csrf_field() !!}
                                                                                {{ method_field('DELETE') }}
                                                                                <button type="submit" class="btn btn-info">
                                                                                    @lang('messages.Gui-Borrar')
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @else
                                            <p>@lang('messages.Gui-Favoritos')</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div><!--Panel body-->
            </div><!--Panel body-->
        </div><!--COl-md-10-->
    </div><!--Row-->
</div><!--Container-->
@endsection
