@extends('layouts.app')

@section('content')
<div  class="container">
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="active">Inicio</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bienvenido a Balmeslol
                                </div>
                                <div class="panel-body-min">
                                    <p>
                                        Balmeslol es un portal que ofrece información detallada y específica del juego on-line League of Legends. 
                                        Los datos empleados son a tiempo real y totalmente precisos extraídos directamente de los servidores de este. 
                                        Balmeslol ofrece guías creadas por la comunidad de campeones así como diversas estadísticas actualizadas.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Rotación semanal gratuita
                                </div>
                                <div class="panel-body-min">
                                    <div class="row">
                                        <div class="col-md-7">
                                            @foreach($campeones as $campeon)
                                                @foreach($campeonesGratuitos as $idCampGratis)
                                                    @if($campeon['id'] == $idCampGratis['id'])
                                                        <a href="/campeones/{{ $campeon['id'] }}">
                                                            <div class="champ-box">
                                                                <img src="{{ $campeon['imagen'] }}">
                                                                <div class="champ-info">
                                                                    {{ $campeon['nombre'] }}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <div class="col-md-5">
                                            <p>La rotación semanal es un conjunto de campeones que están disponibles a todo el mundo sin necesidad de poseer al campeón, <b>la rotación cambia cada martes</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--Panel default-->
                        </div><!--Col-md-12-->
                    </div><!--Row-->
                </div><!--Panel body-->
            </div><!--Panel default-->
        </div><!--Col-md-10-->
    </div><!--Row-->
</div><!--Container-->
@endsection
