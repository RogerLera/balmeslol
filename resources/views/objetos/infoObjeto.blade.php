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
                                <li><a href="{{ url('/objetos') }}">Objetos</a></li>
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
                                            Precio: <span class="pricetext"> {{ $objeto['precio']['total'] }}</span> <img src="{{asset('/images/coinicon.png')}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    Precio de la receta: <span class="pricetext"> {{ $objeto['precio']['base'] }}</span> <img src="{{asset('/images/coinicon.png')}}">
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
                                    <li class="active"><a data-toggle="tab" href="#from">A partir de</a></li>
                                    {{--*/ $factive = "in active";  /*--}}
                                @endif
                                @if (!isset($objeto['procede']) && isset($objeto['mejora']))
                                    <li class="active"><a data-toggle="tab" href="#to">Se convierte en</a></li>
                                    {{--*/ $tactive = "in active";  /*--}}
                                @elseif (isset($objeto['procede']) && isset($objeto['mejora']))
                                    <li><a data-toggle="tab" href="#to">Se convierte en</a></li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="from" class="tab-pane fade {{$factive}}">
                                    <br>
                                    @if (isset($objeto['procede']))
                                        <table class="table-items">
                                            <thead>
                                                <tr>
                                                    <th>Imagen</th>
                                                    <th>Nombre</th>
                                                    <th>Coste mejora</th>
                                                    <th>Coste total</th>
                                                    <th>Se hace con</th>
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
                                                                    <img class="itemsmall-build" src="{{ $img }}">
                                                                @endforeach
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
                                                    <th>Imagen</th>
                                                    <th>Nombre</th>
                                                    <th>Coste mejora</th>
                                                    <th>Coste total</th>
                                                    <th>Se hace con</th>
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
                                                                <img class="itemsmall-build" src="{{ $img }}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
