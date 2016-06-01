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
                                <li class="active">@lang('messages.Hechizos')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                       	    @foreach($hechizos as $hechizo)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ $hechizo['nombre'] }}
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-2">
                                           <img class="customborder" src="{{ $hechizo['imagen'] }}">
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{ $hechizo['descripcion'] }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><b>@lang('messages.Hec-Obtiene'): {{ $hechizo['nivel'] }}</b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-2">
                                            <p><b>@lang('messages.Hec-Reutilizacion'): {{ $hechizo['reutilizacion'] }} @lang('messages.Hec-Segundos')</b></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
        			        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
