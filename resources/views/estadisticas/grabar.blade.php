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
                                <li class="active">@lang('messages.EstaGrabar-Titulo')</li>
                            </ul>
                        </div>
                        @if($ok == 'Ok')
                            @lang('messages.EstaGrabar-MsjOk')
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

