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
                                <li class="active">@lang('messages.Mensajes')</li>
                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            @lang('messages.Mensajes-SinLeer')
                                        </div>
                                        <div class="panel-body-min">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! csrf_field() !!}
                                                    @if (Session::has('error_message'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {!! Session::get('error_message') !!}
                                                        </div>
                                                    @endif

                                                    @if($threads->count() > 0)
                                                        @foreach($threads as $thread)
                                                            @foreach($thread->participants as $participant)
                                                                @if($participant->user_id === Auth::id())
                                                                    @if ($thread->isUnread($currentUserId))
                                                                        <div class="alert alert-info" role="alert">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <img style="width:30%;" src="{{asset('/images/alert') }}.png">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <p><strong>@lang('messages.Mensajes-Sujeto'):</strong> {!! link_to('mensajes/' . $thread->id, $thread->subject) !!}</p>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <p><strong>@lang('messages.Mensajes-Remitente'):</strong> {!! $thread->creator()->usuAlias !!}</p>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <p>{!! $thread->created_at->diffForHumans() !!}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            @lang('messages.Mensajes-Leidos')
                                        </div>
                                        <div class="panel-body-min">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($threads->count() > 0)
                                                        @foreach($threads as $thread)
                                                            @foreach($thread->participants as $participant)
                                                                @if($participant->user_id === Auth::id())
                                                                    @if (!$thread->isUnread($currentUserId))
                                                                        <div class="alert alert-success" role="alert">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <img style="width:30%;" src="{{asset('/images/success') }}.png">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <p><strong>@lang('messages.Mensajes-Sujeto'):</strong> {!! link_to('mensajes/' . $thread->id, $thread->subject) !!}</p>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <p><strong>@lang('messages.Mensajes-Remitente'):</strong> {!! $thread->creator()->usuAlias !!}</p>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <p>{!! $thread->created_at->diffForHumans() !!}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/mensajes/crear" class="btn btn-info" role="button">@lang('messages.Mensajes-NuevoMsj')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
