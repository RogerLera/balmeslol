@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/perfil/{{ Auth::id()}}/editar">
                        {!! csrf_field() !!}

                        <!-- NOMBRE -->
                        <div class="form-group{{ $errors->has('usuAlias') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Alias</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="usuAlias" value="{{ Auth::user()->usuAlias }}">

                                @if ($errors->has('usuAlias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuAlias') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- FECHA NACIMIENTO -->
                        <div class="form-group{{ $errors->has('usuFdn') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha nacimiento</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="usuFdn" value="{{ Auth::user()->usuFdn }}">

                                @if ($errors->has('usuFdn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuFdn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- AVATAR -->
                        <div class="form-group{{ $errors->has('usuAvatar') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Imagen de perfil</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="usuAvatar" value="{{ Auth::user()->usuAvatar }}">

                                @if ($errors->has('usuAvatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuAvatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Editar
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
