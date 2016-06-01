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
                                <li class="active">{!! $thread->subject !!}</li>
                            </ul>
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    {!! csrf_field() !!}
                                    @foreach($thread->messages as $message)
                      
                                            <?php if ($message->user->id == Auth::id()) {
                                                $foto = 'pull-right';
                                                $text = 'text-right';
                                            } else {
                                                $foto = 'pull-left';
                                                $text = 'text-left';
                                            }
                                            ?>
                                            <div class="media {!!$text!!}">
                                                <a class="{!!$foto!!}" href="#">
                                                    <img src="/perfil/{{ $message->user->id }}/avatar" alt="{!! $message->user->usuAlias !!}" class="img-responsive img-rounded" height="75" width="75">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">{!! $message->user->usuAlias !!}</h5>
                                                    <p>{!! $message->body !!}</p>
                                                    <div class="text-muted"><small>Enviado {!! $message->created_at->diffForHumans() !!}</small></div>
                                                </div>
                                            </div>
                                 
                                    @endforeach
                               
                                            <h3>@lang('messages.Mensajes-Añadir'):</h3>
                                            {!! Form::open(['route' => ['mensajes.actualizar', $thread->id], 'method' => 'PUT']) !!}
                                            <!-- Message Form Input -->
                                            <div class="form-group">
                                                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                                            </div>
                                            
                                            <div class="form-group">
                                                <p><span class="text-muted">@lang('messages.Mensajes-Participantes'):</span>
                                                @foreach($thread->participants as $participant)
                                                    {{{$participant == $thread->participants[count($thread->participants)-1] ? $participant->user->usuAlias."." : $participant->user->usuAlias."," }}}
                                                @endforeach
                                                </p> 
                                            </div>

                                            <!-- Submit Form Input -->
                                            <div class="form-group">
                                                {!! Form::submit('@lang('messages.Enviar')', ['class' => 'btn btn-info form-control']) !!}
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
</div>
@endsection
