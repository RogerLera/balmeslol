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
                                <li class="active">Estadísticas de popularidad de los campeones</li>
                            </ul>
                            <table id="ordenar" width="60%" class="table table-hover tablesorter">
                                <thead>
                                    <tr>
                                        <th width="20%">&nbsp;</th>
                                        <th>Nombre</th>
                                        <th>Popularidad (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($estadisticas as $estadistica)
                                    <tr>
                                        <td><img height="80" width="80" class="customborder img-responsive" src="{{ $estadistica['imagen'] }}"></td>
                                        <td>{{ $estadistica['nombre'] }}</td>
                                        <td>{{ $estadistica['porciento'] }}</td>
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
</div>

@endsection
