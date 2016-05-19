@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Objetos</div>
                <div class="panel-body-min">
                    <p><img src="{{ $objeto['imagen'] }}"> {{ $objeto['nombre'] }}</p>
                    <p>Descripcion: {{ $objeto['descripcion'] }}</p>
                    <p>Precio total: {{ $objeto['precio']['total'] }}</p>
                    <p>Precio de la receta: {{ $objeto['precio']['base'] }}</p>
                    @foreach ($objeto['transforma'] as $transforma)
                        <img src="{{ $transforma }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
