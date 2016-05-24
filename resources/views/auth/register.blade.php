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
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li class="active">Registro</li>
                            </ul>
                        </div>
                    </div>
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <!-- NOMBRE -->
                        <div class="form-group{{ $errors->has('usuAlias') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Alias</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="usuAlias" value="{{ old('usuAlias') }}">

                                @if ($errors->has('usuAlias'))
                                    <br>
                                    <div class="alert alert-danger">
                                         <strong>Error! </strong>{{ $errors->first('usuAlias') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>Error! </strong>{{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- FECHA NACIMIENTO -->
                        <div class="form-group{{ $errors->has('usuFdn') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha nacimiento</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="usuFdn" value="{{ old('usuFdn') }}">

                                @if ($errors->has('usuFdn'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>Erorr! </strong>{{ $errors->first('usuFdn') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- AVATAR -->
                        <div class="form-group{{ $errors->has('usuAvatar') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Imagen de perfil</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="usuAvatar" value="{{ old('usuAvatar') }}">

                                @if ($errors->has('usuAvatar'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>Error! </strong>{{ $errors->first('usuAvatar') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>Error! </strong>{{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmación contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>Error! </strong>{{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-user"></i> Registrarse
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
