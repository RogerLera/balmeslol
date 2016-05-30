@extends('layouts.appGuias')

@section('content')
    <!-- Pasamos el contenido de la posición 0 a la última del array, para mostrar la tabla correctamente. -->
    {{--*/ array_push($runas, $runas[0]); unset($runas[0]); /*--}}
    @for($n = 1; $n < (count($runas) + 1); $n++)
        @if ($n === 1)
            <tr><td><div class="borde"><img src="{{ $runas[$n]['imagen'] }}" alt="{{ $runas[$n]['nombre'] }}"><div class="infoRunas"><h5>{{ $runas[$n]['descripcion'] }}</h5></div></div></td>
        @elseif ($n % 2 === 0)
            <td><div class="borde"><img src="{{ $runas[$n]['imagen'] }}" alt="{{ $runas[$n]['nombre'] }}"><div class="infoRunas"><h5>{{ $runas[$n]['descripcion'] }}</h5></div></div></td></tr><tr>
        @else
            <td><div class="borde"><img src="{{ $runas[$n]['imagen'] }}" alt="{{ $runas[$n]['nombre'] }}"><div class="infoRunas"><h5>{{ $runas[$n]['descripcion'] }}</h5></div></div></td>
        @endif
    @endfor
@endsection
