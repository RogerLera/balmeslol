@extends('layouts.appGuias')

@section('content')
    <tr style="position:absolute;top:30px;left:30px;">
        @foreach($habilidades as $tipo => $habilidad)
            <td><img src="{{ $habilidad['imagen'] }}" alt="{{ $tipo }}" title="{{ $habilidad['nombre'] }}"></td>
        @endforeach
    </tr>
@endsection
