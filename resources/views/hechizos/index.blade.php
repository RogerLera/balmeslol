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
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li class="active">Hechizos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                       	    @foreach($hechizos as $hechizo)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ $hechizo['nombre'] }}
                                </div>
                                <div class="panel-body-min">
                                    {{ $hechizo['descripcion'] }}
                                </div>
                            </div>

                		 		<a href="/hechizos/{{ $hechizo['id'] }}">
                		 			<div class="champ-box">
                		 				<img src="{{ $hechizo['imagen'] }}">
            		 					<div class="champ-info">
            		 						{{ $hechizo['nombre'] }}
            		 					</div>
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
@endsection
