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
                                <br>
                                <p>Filtrar</p>
                                <select class="selectpicker" id="filtrarcampeon">
                                    <optgroup label="Rol">
                                    <option value="Mage">Mago</option>
                                    <option value="Fighter">Luchador</option>
                                    <option value="Support">Soporte</option>
                                    <option value="Assasin">Asesino</option>
                                    <option value="Tank">Tanque</option>
                                    <option value="Marksman">Tirador</option>
                                </select>
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
                                @foreach($campeon['tags'] as $tag)
                                    <input type="hidden" id="tag" value="{{ $tag }}">
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
