@extends('layouts.appGuias')

@section('content')
    <tr>
        @foreach($habilidades as $tipo => $habilidad)
            <td><img src="{{ $habilidad['imagen'] }}" alt="{{ $tipo }}" title="{{ $habilidad['nombre'] }}"></td>
        @endforeach
    </tr>
@endsection
