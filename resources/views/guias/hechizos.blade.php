@extends('layouts.appGuias')

@section('content')
    <!-- Pasamos el contenido de la posición 0 a la última del array, para mostrar la tabla correctamente. -->
    {{--*/ array_push($hechizos, $hechizos[0]); unset($hechizos[0]); /*--}}
    @for($n = 1; $n < (count($hechizos) + 1); $n++)
        @if ($n === 1)
            <tr><td><img src="{{ $hechizos[$n]['imagen'] }}" alt="{{ $hechizos[$n]['nombre'] }}" title="{{ $hechizos[$n]['nombre'] }}"></td>
        @elseif ($n % 7 === 0)
            <td><img src="{{ $hechizos[$n]['imagen'] }}" alt="{{ $hechizos[$n]['nombre'] }}" title="{{ $hechizos[$n]['nombre'] }}"></td></tr><tr>
        @else
            <td><img src="{{ $hechizos[$n]['imagen'] }}" alt="{{ $hechizos[$n]['nombre'] }}" title="{{ $hechizos[$n]['nombre'] }}"></td>
        @endif
    @endfor
@endsection
