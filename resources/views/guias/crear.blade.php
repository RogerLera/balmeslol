@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Crear guia</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/guias/crear') }}">
                        {!! csrf_field() !!}

                        <!-- Título -->
                        <div class="form-group{{ $errors->has('guiTitulo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Título</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="guiTitulo" value="{{ old('guiTitulo') }}">

                                @if ($errors->has('guiTitulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guiTitulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Campeones -->
                        <div class="form-group{{ $errors->has('camId') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Campeón</label>

                            <div class="col-md-4">
                                <select class="form-control" name="camNombre">
                                    <option value="1">Seleciona un campeón</option>
                                    @foreach ($campeones as $campeon)
                                        <option value="{{ $campeon['nombre'] }}">{{ $campeon['nombre'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('camId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('camId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Roles -->
                        <div class="form-group{{ $errors->has('rolId') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Rol</label>

                            <div class="col-md-4">
                                <select class="form-control" name="rolId">
                                    <option value="-">Seleciona un rol</option>
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
                            <label class="col-md-3 control-label">Versión</label>

                            <div class="col-md-4">
                                <select class="form-control" name="guiVersion">
                                        <option value="{{ $version }}">{{ $version }}</option>
                                </select>

                                @if ($errors->has('guiVersion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guiVersion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Usuario de la guia -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Usuario</label>

                            <div class="col-md-4">
                                <select class="form-control" name="usuId">
                                    <option value="{{ Auth::id() }}">{{ Auth::user()->usuAlias }}</option>
                                </select>
                            </div>
                        </div>

                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <div class="panel-group" id="accordion">
                                <!-- Hechizos -->
                                <div class="form-group{{ $errors->has('guiHechizos') ? ' has-error' : '' }}">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Hechizos</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
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
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Runas</a>
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
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                Habilidades</a>
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
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                Objetos</a>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Crear guia
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
