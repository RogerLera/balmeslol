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
                                <li class="active">Conversaciones</li>
                            </ul>

                            @if (Session::has('error_message'))
                            <div class="alert alert-danger" role="alert">
                                {!! Session::get('error_message') !!}
                            </div>
                            @endif
                            @if($threads->count() > 0)
                            @foreach($threads as $thread)
                            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                            <div class="media alert {!!$class!!}">
                                <h4 class="media-heading">{!! link_to('mensajes/' . $thread->id, $thread->subject) !!}</h4>
                                <p>{!! $thread->latestMessage->body !!}</p>
                                <p><small><strong>Creador:</strong> {!! $thread->creator()->usuAlias !!}</small></p>
                            </div>
                            @endforeach
                            @else
                            <p>Lo sentimos, no se encuentran mensajes.</p>
                            @endif
                            @stop
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
