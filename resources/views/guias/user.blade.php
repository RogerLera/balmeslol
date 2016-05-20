@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Mis guias</div>
                        <div class="col-md-3">
                            <a href="{{ url('/guias/favoritos') }}">Guias favoritas</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('/guias/crear') }}">Crear guia</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (count($guias) > 0)
                        @foreach($guias as $guia)
                            <p>{{ $guia->guiTitulo }}</p>
                        @endforeach
                    @else
                        <p>No existe ninguna guia! <a href="{{ url('/guias/crear') }}">Crea una guia!</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
