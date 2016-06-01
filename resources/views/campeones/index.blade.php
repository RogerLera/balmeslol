@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                             <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">@lang('messages.Inicio')</a></li>
                                    <li class="active">@lang('messages.Campeones')</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>@lang('messages.Cam-Campeonbuscar')</p>
                                <input type="text" id="buscarcampeon" class="form-control" placeholder="@lang('messages.Cam-Buscarcampeon')">
                            </div>
                            <div class="col-md-6">
                                <p>@lang('messages.Cam-Filtrar')</p>
                                <select class="selectpicker" id="filtrarcampeon">
                                    <option selected value="Todos"><b>@lang('messages.Cam-Todos')</b></option>
                                    <option value="Gratis">@lang('messages.Cam-Rotacion')</option>
                                    <optgroup label="@lang('messages.Cam-Rol')">
                                    <option value="Mage">@lang('messages.Cam-Mago')</option>
                                    <option value="Fighter">@lang('messages.Cam-Luchador')</option>
                                    <option value="Support">@lang('messages.Cam-Soporte')</option>
                                    <option value="Assassin">@lang('messages.Cam-Asesino')</option>
                                    <option value="Tank">@lang('messages.Cam-Tanque')</option>
                                    <option value="Marksman">@lang('messages.Cam-Tirador')</option>
                                </select>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
    </div>
</div>
@endsection
