@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio de sesión</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuario/inicioSesion') }}">
                        {!! csrf_field() !!}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="recordar"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Iniciar sesión
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidaste tu contrasenya?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
