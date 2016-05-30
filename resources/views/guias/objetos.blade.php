@extends('layouts.appGuias')

@section('content')
    <!-- Pasamos el contenido de la posición 0 a la última del array, para mostrar la tabla correctamente. -->
    {{--*/ array_push($objetos, $objetos[0]); unset($objetos[0]); /*--}}
    @for($n = 1; $n < count($objetos); $n++)
        @if ($n === 1)
            <tr><td><img src="{{ $objetos[$n]['imagen'] }}" alt="{{ $objetos[$n]['nombre'] }}" title="{{ $objetos[$n]['nombre'] }}"></td>
        @elseif ($n % 10 === 0)
            <td><img  src="{{ $objetos[$n]['imagen'] }}" alt="{{ $objetos[$n]['nombre'] }}" title="{{ $objetos[$n]['nombre'] }}"></td></tr><tr>
        @else
            <td><img src="{{ $objetos[$n]['imagen'] }}" alt="{{ $objetos[$n]['nombre'] }}" title="{{ $objetos[$n]['nombre'] }}"></td>
        @endif
    @endfor
@endsection
