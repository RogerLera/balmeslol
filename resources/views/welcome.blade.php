@extends('layouts.app')

@section('content')
<div  class="container">
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="active">@lang('messages.Inicio')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     @lang('messages.Bienvenido-titulo')
                                </div>
                                <div class="panel-body-min">
                                    <p>
                                        @lang('messages.Bienvenido')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   @lang('messages.Rotacion-titulo')
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-7">
                                            @foreach($campeones as $campeon)
                                                @foreach($campeonesGratuitos as $idCampGratis)
                                                    @if($campeon['id'] == $idCampGratis['id'])
                                                        <a href="/campeones/{{ $campeon['id'] }}">
                                                            <div class="champ-box">
                                                                <img src="{{ $campeon['imagen'] }}">
                                                                <div class="champ-info">
                                                                    {{ $campeon['nombre'] }}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <div class="col-md-5">
                                            <p>@lang('messages.Rotacion-descripcion')</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--Panel default-->
                        </div><!--Col-md-12-->
                    </div><!--Row-->
                </div><!--Panel body-->
            </div><!--Panel default-->
        </div><!--Col-md-10-->
    </div><!--Row-->
</div><!--Container-->
@endsection
