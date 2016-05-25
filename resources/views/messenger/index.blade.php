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
                                <li class="active">Mensajes</li>
                            </ul>
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
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
                                    <?php
                                    if ($thread->isUnread($currentUserId)) {
                                        $class = 'alert-info';
                                        $nuevo = "(¡Nuevo!)";
                                    } else {
                                        $class = 'alert-success';
                                        $nuevo = "";
                                    }
                                    ?>
                                    <div class="media alert {!!$class!!}">
                                        <h4 class="media-heading">{!! link_to('mensajes/' . $thread->id, $thread->subject) !!} {!!$nuevo!!}</h4>
                                        <p>{!! $thread->latestMessage->body !!}</p>
                                        <br>
                                        <p><small><strong>Último mensaje de:</strong> {!! $thread->participants[count($thread->participants)-1]->user->usuAlias !!}</small></p>
                                        <p><small><strong>Creador:</strong> {!! $thread->creator()->usuAlias !!}</small></p>
                                    </div>
                                    @endif
                                    @endforeach
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
    </div>
</div>
