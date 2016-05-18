@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Campeones</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Escribe el nombre del campeón que quieras buscar</p>
                                <input type="text" id="buscarcampeon" class="form-control" placeholder="Buscar campeón">
                            </div>
                            <div class="col-md-6">
                                <p>Filtrar</p>
                                <select class="selectpicker" id="filtrarcampeon">
                                    <option selected value="Todos"><b>Todos</b></option>
                                    <option value="Gratis">Rotación Semanal</option>
                                    <optgroup label="Rol">
                                    <option value="Mage">Mago</option>
                                    <option value="Fighter">Luchador</option>
                                    <option value="Support">Soporte</option>
                                    <option value="Assassin">Asesino</option>
                                    <option value="Tank">Tanque</option>
                                    <option value="Marksman">Tirador</option>
                                </select>
                                <br>
                                <br>

                            </div>
                        </div>
                   	    @foreach($campeones as $campeon)
	    		 		<a href="/campeones/{{ $campeon['id'] }}">
	    		 			<div class="champ-box">
	    		 				<img src="{{ $campeon['imagen'] }}">
    		 					<div class="champ-info">
    		 						{{ $campeon['nombre'] }}
    		 					</div>
                                <!--Comprovamos las etiquetas de los campeones-->
                                @foreach($campeon['tags'] as $tag)
                                    <input type="hidden" name="tag" value="{{ $tag }}">
                                @endforeach
                                <!--Comprovamos los campeones gratuitos semanales-->
                                @foreach($campeonesGratuitos as $idCampGratis)
                                    @if($campeon['id'] == $idCampGratis['id'])
                                    <input type="hidden" name="gratis" value="Gratis">
                                    @endif
                                @endforeach
	    		 			</div>
	    		 		</a>
  			           @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection