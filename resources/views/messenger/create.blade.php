@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Mensaje nuevo</div>
                <div class="panel-body">

                    {!! Form::open(['route' => 'mensajes.guardar']) !!}
                    <div class="col-md-6">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {!! Form::label('subject', 'Sujeto', ['class' => 'control-label']) !!}
                            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            {!! Form::label('message', 'Mensaje', ['class' => 'control-label']) !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>

                        @if($users->count() > 0)
                        <div class="checkbox">
                            @foreach($users as $user)
                            <label title="{!!$user->usuAlias!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->usuAlias!!}</label>
                            @endforeach
                        </div>
                        @endif

                        <!-- Submit Form Input -->
                        <div class="form-group">
                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @stop

                </div>
            </div>
        </div>
    </div>
</div>