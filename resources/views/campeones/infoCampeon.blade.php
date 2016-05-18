@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $campeon['nombre'] }}, {{ $campeon['titulo'] }}</div>
                <div class="panel-body-min">
                    <div class="splashart"> 
                        <img src="{{ $campeon['retrato'] }}"> 
                        <p class="splash-title"><b>{{ $campeon['nombre'] }}</b><br><i>{{ $campeon['titulo'] }}</i></p>
                    </div>
                    <br><br>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#lore">Lore</a></li>
                        <li><a data-toggle="tab" href="#caracteristicas">Características</a></li>
                        <li><a data-toggle="tab" href="#estadisticas">Estadísticas</a></li>
                        <li><a data-toggle="tab" href="#habilidades">Habilidades</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="lore" class="tab-pane fade in active">
                            <h3>Lore</h3>
                            <p>{{ $campeon['lore'] }}</p>
                        </div>
                        <div id="caracteristicas" class="tab-pane fade">
                            <!--Barras de caracteristicas de colores-->
                            <h3>Características</h3>
                            @foreach($campeon['caracteristicas'] as $atributo => $valor)
                                <label>{{ $atributo }}</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-{{ $atributo }}" role="progressbar" aria-valuenow="{{ $valor }}"
                                  aria-valuemin="0" aria-valuemax="10" style="width:{{ $valor }}0%">
                                    {{ $valor }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="estadisticas" class="tab-pane fade">
                            <h3>Estadísticas</h3>
                            <table class="table-bordered">
                                <tbody>
                                  <?php $count = 1 ?>
                                @foreach($campeon['estadisticas'] as $atributo => $valor)
                                @if ($count % 2 == 0)
                              
                                    <td> <b>{{ $atributo }}:</b> {{ $valor }}</td>   
                                </tr>
                                @else 
                                  <tr>
                                <td> <b>{{ $atributo }}:</b> {{ $valor }}</td>

                                @endif
                                <?php $count++ ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="habilidades" class="tab-pane fade">
                            <h3>Habilidades</h3>
                            @foreach($campeon['habilidades'] as $atributo => $valor)
                                <h4>{{  $atributo }}</h4>
                                <p>{{ $valor['Nombre'] }}</p>
                                <p>{{ $valor['Descripcion'] }}</p>
                                <p><img src="{{ $valor['Imagen'] }}"></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
