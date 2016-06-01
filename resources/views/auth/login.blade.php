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
                                <li class="active">@lang('messages.Iniciar')</li>
                            </ul>
                        </div>
                    </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('usuAlias') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">@lang('messages.Alias')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="usuAlias" value="{{ old('usuAlias') }}">

                                @if ($errors->has('usuAlias'))
                                    <br>
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('usuAlias') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">@lang('messages.Contraseña')</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                   <br>
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> @lang('messages.Recordarme')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-sign-in"></i> @lang('messages.Iniciar-sesión')
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">@lang('messages.Contraseña-olvidada')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
