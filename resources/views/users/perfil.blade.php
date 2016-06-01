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
                                <li class="active">@lang('messages.Per-Perfil')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">@lang('messages.Per-Detalles')</div>
                                    <div class="panel-body-nop">
                                        <img src="/perfil/{{ $usuario->id }}/avatar" class="profile-edit" alt="Avatar usuario">
                                        <br><br>
                                        <p><b>{{ $usuario->usuAlias }}</b></p>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $usuario->email }}</p>
                                        <p><b>@lang('messages.Per-Fecha'):</b> {{ $usuario->usuFdn }} </p>
                                        <br>
                                    </div>
                            </div>
                        </div>
                        @if (Auth::id() === $usuario->id)
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">@lang('messages.Per-Actinfo')</div>
                                    <div class="panel-body-min">
                                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/perfil/{{ Auth::id()}}/editar">
                                            {!! csrf_field() !!}

                                            <!-- NOMBRE -->
                                            <div class="form-group{{ $errors->has('usuAlias') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">@lang('messages.Per-Alias')</label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="usuAlias" value="{{ Auth::user()->usuAlias }}">

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
                                                <label class="col-md-4 control-label">@lang('messages.Per-Direccion')</label>

                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

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
                                                <label class="col-md-4 control-label">@lang('messages.Per-Fecha')</label>

                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" name="usuFdn" value="{{ Auth::user()->usuFdn }}">

                                                    @if ($errors->has('usuFdn'))
                                                        <br>
                                                        <div class="alert alert-danger">
                                                            <strong>Error! </strong>{{ $errors->first('usuFdn') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- AVATAR -->
                                            <div class="form-group{{ $errors->has('usuAvatar') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">@lang('messages.Per-Imagen')</label>

                                                <div class="col-md-6">
                                                    <input data-buttonText="@lang('messages.Per-Examinar')" type="file" class="form-control" name="usuAvatar" value="{{ Auth::user()->usuAvatar }}">

                                                    @if ($errors->has('usuAvatar'))
                                                        <br>
                                                        <div class="alert alert-danger">
                                                            <strong>Error! </strong>{{ $errors->first('usuAvatar') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fa fa-btn fa-user"></i> @lang('messages.Per-Actualizar')
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">@lang('messages.Per-Cambiarpswd')</div>
                                            <div class="panel-body-min">
                                                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/perfil/{{ Auth::id()}}/editar/password">
                                                    {!! csrf_field() !!}

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label class="col-md-4 control-label">@lang('messages.Per-Pswd')</label>

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
                                                        <label class="col-md-4 control-label">@lang('messages.Per-Confpswd')</label>

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
                                                                <i class="fa fa-btn fa-user"></i> @lang('messages.Per-Actualizar')
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
