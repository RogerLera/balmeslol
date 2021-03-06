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
                                <li><a href="{{ url('/mensajes') }}">@lang('messages.Mensajes')</a></li>
                                <li class="active">@lang('messages.Nuevo')</li>
                            </ul>
                            {!! csrf_field() !!}
                            {!! Form::open(['route' => 'mensajes.guardar']) !!}
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <!-- Subject Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('subject', Lang::get('messages.Sujeto'), ['class' => 'control-label']) !!}
                                        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Message Form Input -->
                                    <div class="form-group">
                                        {!! Form::label('message', Lang::get('messages.Mensaje'), ['class' => 'control-label']) !!}
                                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                                    </div>

                                    @if($users->count() > 0)
                                    {!! Form::label('recipientes', Lang::get('messages.Destinatario'), ['class' => 'control-label']) !!}
                                    <div class="checkbox">
                                        @foreach($users as $user)
                                        <label title="{!!$user->usuAlias!!}"><input type="checkbox" id="recipientes" name="recipients[]" value="{!!$user->id!!}">{!!$user->usuAlias!!}</label>
                                        @endforeach
                                    </div>
                                    @endif

                                    <!-- Submit Form Input -->
                                    <div class="form-group">
                                        {!! Form::submit(Lang::get('messages.Enviar'), ['class' => 'btn btn-info form-control']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection