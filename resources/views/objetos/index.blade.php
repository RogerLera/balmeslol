@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Objetos</div>
                <div class="panel-body">
                    @foreach($objetos as $objeto)
                        <a href="/objetos/{{ $objeto['id'] }}">
                            <div class="object-box">
                                <img src="{{ $objeto['imagen'] }}">
                                <div class="object-info">
                                    {{ $objeto['nombre'] }}
                                </div>
                                <!--Comprovamos las etiquetas de los objetos-->
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
