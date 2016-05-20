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
                                <li class="active">Objetos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Escribe el nombre del objeto que quieras buscar</p>
                            <input type="text" id="buscarobjeto" class="form-control" placeholder="Buscar objeto">
                        </div>
                        <div class="col-md-6">
                            <p>Filtrar objetos</p>
                            <p><b>Defensa</b></p>
                            <div class="checkbox">
                                <label><input type="checkbox" value="Health">Vida</label>
                                <label><input type="checkbox" value="Armor">Armadura</label>
                                <label><input type="checkbox" value="MagicResist">Resistencia mágica</label>
                                <label><input type="checkbox" value="HealthRegen">Regeneración de vida</label>
                                <label><input type="checkbox" value="Tenacity">Tenacidad</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
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
    </div>
</div>
@endsection
