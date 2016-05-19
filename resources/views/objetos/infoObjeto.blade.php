@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Objetos</div>
                <div class="panel-body-min">
                    <p><img src="{{ $objeto['imagen'] }}"> {{ $objeto['nombre'] }}</p>
                    <p>Precio total: {{ $objeto['precio']['total'] }}</p>
                    <p>Precio de la receta: {{ $objeto['precio']['base'] }}</p>
                    @foreach ($objeto['estadisticas'] as $estadistica)
                        <p>{{ $estadistica }}</p>
                    @endforeach
                    @if (isset($objeto['procede']))
                        <p>{{ $objeto['nombre'] }} se convierte en:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Coste mejora</th>
                                    <th>Coste total</th>
                                    <th>Se hace con</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($objeto['procede'] as $procede)
                                    <tr>
                                        <td>{{ $procede['nombre'] }} <img src="{{ $procede['imagen'] }}"></td>
                                        <td>{{ $procede['precio']['base'] }}</td>
                                        <td>{{ $procede['precio']['total'] }}</td>
                                        <td>
                                            @if (isset($procede['procede']))
                                                @foreach ($procede['procede'] as $img)
                                                    <img src="{{ $img }}">
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if (isset($objeto['mejora']))
                        <p>{{ $objeto['nombre'] }} se convierte en:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Coste mejora</th>
                                    <th>Coste total</th>
                                    <th>Se hace con</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($objeto['mejora'] as $mejora)
                                    <tr>
                                        <td>{{ $mejora['nombre'] }} <img src="{{ $mejora['imagen'] }}"></td>
                                        <td>{{ $mejora['precio']['base'] }}</td>
                                        <td>{{ $mejora['precio']['total'] }}</td>
                                        <td>
                                            @foreach ($mejora['procede'] as $img)
                                                <img src="{{ $img }}">
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
@endsection
