@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/usuario/registro') }}">
                        {!! csrf_field() !!}

                        <!-- NOMBRE -->
                        <div class="form-group{{ $errors->has('usuAlias') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Alias</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="usuAlias" value="{{ old('usuAlias') }}">

                                @if ($errors->has('usuAlias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuAlias') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group{{ $errors->has('usuEmail') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="usuEmail" value="{{ old('usuEmail') }}">

                                @if ($errors->has('usuEmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emusuEmailail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- FECHA NACIMIENTO -->
                        <div class="form-group{{ $errors->has('usuFdn') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha nacimiento</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="usuFdn" value="{{ old('usuFdn') }}">

                                @if ($errors->has('usuFdn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuFdn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- AVATAR -->
                        <div class="form-group{{ $errors->has('usuAvatar') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha nacimiento</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="usuAvatar" value="{{ old('usuAvatar') }}">

                                @if ($errors->has('usuAvatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuAvatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('usuPswd') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="usuPswd">

                                @if ($errors->has('usuPswd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuPswd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmación contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrarse
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
