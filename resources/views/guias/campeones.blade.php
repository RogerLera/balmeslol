@extends('layouts.appGuias')

@section('content')
    <!-- Pasamos el contenido de la posición 0 a la última del array, para mostrar la tabla correctamente. -->
    {{--*/ array_push($campeones, $campeones[0]); unset($campeones[0]); /*--}}
    @for($n = 1; $n < count($campeones); $n++)
        @if ($n === 1)
            <tr><td><img id="{{ $campeones[$n]['id'] }}" src="{{ $campeones[$n]['imagen'] }}" alt="{{ $campeones[$n]['nombre'] }}" title="{{ $campeones[$n]['nombre'] }}"></td>
        @elseif ($n % 10 === 0)
            <td><img id="{{ $campeones[$n]['id'] }}" src="{{ $campeones[$n]['imagen'] }}" alt="{{ $campeones[$n]['nombre'] }}" title="{{ $campeones[$n]['nombre'] }}"></td></tr><tr>
        @else
            <td><img id="{{ $campeones[$n]['id'] }}" src="{{ $campeones[$n]['imagen'] }}" alt="{{ $campeones[$n]['nombre'] }}" title="{{ $campeones[$n]['nombre'] }}"></td>
        @endif
    @endfor
@endsection
