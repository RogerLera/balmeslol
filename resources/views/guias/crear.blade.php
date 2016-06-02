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
                                <li class="active">@lang('messages.Gui-Crear')</li>
                            </ul>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/guias/crear') }}">
                        {!! csrf_field() !!}

                        <!-- Título -->
                        <div class="form-group{{ $errors->has('guiTitulo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">@lang('messages.Gui-Titulo')</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="guiTitulo" value="{{ old('guiTitulo') }}">

                                @if ($errors->has('guiTitulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guiTitulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Campeones -->
                        <div class="form-group{{ $errors->has('camNombre') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">@lang('messages.Gui-Campeon')</label>

                            <div class="col-md-4">
                                <select class="form-control selectpicker" name="camNombre" data-live-search="true">
                                    <option data-hidden="true">@lang('messages.Gui-Selecciona')</option>
                                    @foreach ($campeones as $campeon)
                                        <option value="{{ $campeon['nombre'] }}">{{ $campeon['nombre'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('camNombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('camNombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Roles -->
                        <div class="form-group{{ $errors->has('rolId') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">@lang('messages.Cam-Rol')</label>

                            <div class="col-md-4">
                                <select class="form-control selectpicker" name="rolId">
                                   <option data-hidden="true">@lang('messages.Gui-Selecrol')</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol['rolId'] }}">{{ $rol['rolNombre'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('rolId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rolId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Versión -->
                        <div class="form-group{{ $errors->has('guiVersion') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">@lang('messages.Gui-Version')</label>
                            <div class="col-md-4">
                                <input type="hidden" name="guiVersion" value="{{ $version }}">
                                </p>{{$version}}</p>

                                @if ($errors->has('guiVersion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guiVersion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Usuario de la guia -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">@lang('messages.Gui-Usuario')</label>

                            <div class="col-md-4">
                                <input type="hidden" name="usuId" value="{{ Auth::id() }}">
                                </p>{{ Auth::user()->usuAlias }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel-group" id="accordion">
                                    <!-- Hechizos -->
                                    <div class="form-group{{ $errors->has('guiHechizos') ? ' has-error' : '' }}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <div class="row">
                                                        <div class="col-md-11">@lang('messages.Hechizos')</div>
                                                        <div class="col-md-1">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                                <i style="color:white;" class="fa fa-pencil" aria-hidden="false"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse">
                                                <div>
                                                    <textarea class="form-control guia" name="guiHechizos"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('guiHechizos'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('guiHechizos') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <!-- Runas -->
                                    <div class="form-group{{ $errors->has('guiRunas') ? ' has-error' : '' }}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <div class="row">
                                                        <div class="col-md-11">@lang('messages.Gui-Runas')</div>
                                                        <div class="col-md-1">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                                <i style="color:white;" class="fa fa-pencil" aria-hidden="false"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div>
                                                    <textarea class="form-control guia" name="guiRunas"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('guiRunas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('guiRunas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <!-- Habilidades -->
                                    <div class="form-group{{ $errors->has('guiHabilidades') ? ' has-error' : '' }}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <div class="row">
                                                        <div class="col-md-11">@lang('messages.Inf-Habilidades')</div>
                                                        <div class="col-md-1">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                                <i style="color:white;" class="fa fa-pencil" aria-hidden="false"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapse4" class="panel-collapse collapse">
                                                <div>
                                                    <textarea class="form-control guia" name="guiHabilidades"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('guiHabilidades'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('guiHabilidades') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <!-- Objetos -->
                                    <div class="form-group{{ $errors->has('guiObjetos') ? ' has-error' : '' }}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <div class="row">
                                                        <div class="col-md-11">@lang('messages.Objetos')</div>
                                                        <div class="col-md-1">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                                <i style="color:white;" class="fa fa-pencil" aria-hidden="false"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapse5" class="panel-collapse collapse">
                                                <div>
                                                    <textarea class="form-control guia" name="guiObjetos"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('guiObjetos'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('guiObjetos') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-btn fa-sign-in"></i> @lang('messages.Gui-Crear')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
