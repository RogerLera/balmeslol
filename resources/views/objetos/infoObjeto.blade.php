@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                         <div class="col-md-12">
                            @if ($objeto == "Empty")
                                    <ul class="breadcrumb">
                                        <li><a href="{{ url('/') }}">@lang('messages.Inicio')</a></li>
                                        <li><a href="{{ url('/campeones') }}">@lang('messages.Objetos')</a></li>
                                        <li class="active">@lang('messages.Pagina-Error')</li>
                                    </ul>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img style="width:30%;" src="{{asset('/images/alertwarning') }}.png">
                                            </div>
                                            <div class="col-md-10">
                                                <p>@lang('messages.Info-Error')</p>
                                            </div>
                                        </div>
                                    </div>
                            @else
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">@lang('messages.Inicio')</a></li>
                                <li><a href="{{ url('/objetos') }}">@lang('messages.Objetos')</a></li>
                                <li class="active">{{ $objeto['nombre'] }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $objeto['nombre'] }}</div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="itemimg" src="{{ $objeto['imagen'] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{ $objeto['nombre'] }}</b>
                                        </div>
                                        <div class="col-md-4">
                                            @lang('messages.Info-Precio'): <span class="pricetext"> {{ $objeto['precio']['total'] }}</span> <img src="{{asset('/images/coinicon.png')}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @lang('messages.Info-Receta'): <span class="pricetext"> {{ $objeto['precio']['base'] }}</span> <img src="{{asset('/images/coinicon.png')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-2">
                                            {{--*/ print_r($objeto['estadisticas']) /*--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="nav nav-tabs">
                                <!--Cuando el objeto procede o se convierte en otro mostraremos la pestaña o no y la activaremos-->
                                {{--*/ $factive = "";  /*--}}
                                {{--*/ $tactive = "";  /*--}}
                                @if (isset($objeto['procede']))
                                    <li class="active"><a data-toggle="tab" href="#from">@lang('messages.Info-Apartir')</a></li>
                                    {{--*/ $factive = "in active";  /*--}}
                                @endif
                                @if (!isset($objeto['procede']) && isset($objeto['mejora']))
                                    <li class="active"><a data-toggle="tab" href="#to">@lang('messages.Info-Convierte')</a></li>
                                    {{--*/ $tactive = "in active";  /*--}}
                                @elseif (isset($objeto['procede']) && isset($objeto['mejora']))
                                    <li><a data-toggle="tab" href="#to">@lang('messages.Info-Convierte')</a></li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="from" class="tab-pane fade {{$factive}}">
                                    <br>
                                    @if (isset($objeto['procede']))
                                        <table class="table-items">
                                            <thead>
                                                <tr>
                                                    <th>@lang('messages.Info-Imagen')</th>
                                                    <th>@lang('messages.Info-Nombre')</th>
                                                    <th>@lang('messages.Info-Costem')</th>
                                                    <th>@lang('messages.Info-Costet')</th>
                                                    <th>@lang('messages.Info-Sehacecon')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($objeto['procede'] as $procede)
                                                    <tr>
                                                        <td><a href="/objetos/{{ $procede['id'] }}"><img class="itemsmall-build" src="{{ $procede['imagen'] }}"></a></td>
                                                        <td><a href="/objetos/{{ $procede['id'] }}">{{ $procede['nombre'] }}</a></td>
                                                        <td><span class="pricetext">{{ $procede['precio']['base'] }}</span> <img src="{{asset('/images/coinicon.png')}}"></td>
                                                        <td><span class="pricetext">{{ $procede['precio']['total'] }}</span> <img src="{{asset('/images/coinicon.png')}}"></td>
                                                        <td>
                                                            @if (isset($procede['procede']))
                                                                @foreach ($procede['procede'] as $img)
                                                                    <a href="/objetos/{{ $img['id'] }}"><img class="itemsmall-build" src="{{ $img['img'] }}"></a>                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div id="to" class="tab-pane fade {{$tactive}}">
                                    <br>
                                    @if (isset($objeto['mejora']))
                                        <table class="table-items">
                                            <thead>
                                                <tr>
                                                    <th>@lang('messages.Info-Imagen')</th>
                                                    <th>@lang('messages.Info-Nombre')</th>
                                                    <th>@lang('messages.Info-Costem')</th>
                                                    <th>@lang('messages.Info-Costet')</th>
                                                    <th>@lang('messages.Info-Sehacecon')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($objeto['mejora'] as $mejora)
                                                    <tr>
                                                        <td><a href="/objetos/{{ $mejora['id'] }}"><img class="itemsmall-build" src="{{ $mejora['imagen'] }}"></a></td>
                                                        <td><a href="/objetos/{{ $mejora['id'] }}">{{ $mejora['nombre'] }}</a></td>
                                                        <td><span class="pricetext">{{ $mejora['precio']['base'] }}</span> <img src="{{asset('/images/coinicon.png')}}"></td>
                                                        <td><span class="pricetext">{{ $mejora['precio']['total'] }}</span> <img src="{{asset('/images/coinicon.png')}}"></td>
                                                        <td>
                                                            @foreach ($mejora['procede'] as $img)
                                                                <a href="/objetos/{{ $img['id'] }}"><img class="itemsmall-build" src="{{ $img['img'] }}">
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
