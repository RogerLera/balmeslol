@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Guias</div>
                <div class="panel-body">
                    @if (count($guias) > 0)
                        @foreach($guias as $guia)
                            <div>
                                <img src="http://ddragon.leagueoflegends.com/cdn/{{ $guia->guiVersion }}/img/champion/{{ $guia->camNombre }}.png">
                                <h4>{{ $guia->guiTitulo }}</h4>
                                <form method="">
                                    <span class="glyphicon glyphicon-thumbs-up" onclick="clasificacion({{ $guia->guiId }}, 'meGusta{{ $guia->guiId }}', 1)"></span>&nbsp;
                                    <span id="meGusta{{ $guia->guiId }}">{{ $guia->guiPositivo}}</span>
                                    <span class="glyphicon glyphicon-thumbs-down" onclick="clasificacion({{ $guia->guiId }}, 'noMeGusta{{ $guia->guiId }}', 0)"></span>&nbsp;
                                    <span id="noMeGusta{{ $guia->guiId }}">{{ $guia->guiNegativo}}</span>
                                </form>
                            </div>
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
