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
                                <li class="active">Estadísticas de bloqueo de los hechizos</li>
                            </ul>
                            @foreach($estadisticas as $estadistica)
                            <p><img src="{{ $estadistica['imagen'] }}"> Nombre: {{ $estadistica['nombre'] }} Estadística: {{ $estadistica['porciento'] }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
