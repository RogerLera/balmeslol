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
                                <li class="active">@lang('messages.BloqCamp-Titulo')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('messages.Esta-Grafica')
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="center-block img-responsive" src="{{ asset('/images/graficos/bloqueo_campeones.png') }}">
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
                                    @lang('messages.Esta-Tabla')
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="ordenar" width="60%" class="tablesorter table table-hover table-estadisticas">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">&nbsp;</th>
                                                        <th>@lang('messages.Esta-Nombre')</th>
                                                        <th>@lang('messages.BloqCamp-Porcentaje')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($estadisticas as $estadistica)
                                                    <tr>
                                                        <td><img height="80" width="80" class="customborder img-responsive" src="{{ $estadistica['imagen'] }}"></td>
                                                        <td>{{ $estadistica['nombre'] }}</td>
                                                        <td>{{ $estadistica['porciento'] }}%</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Panel body-->
            </div><!--Panel default-->
        </div><!--Col-md-10-->
    </div><!--Row-->
</div><!--Container-->

@endsection
