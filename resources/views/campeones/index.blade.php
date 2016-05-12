@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Campeones</div>
                <div class="panel-body">
                   	@foreach($campeones as $campeon) 
	    		 		<a href="/campeones/{{ $campeon['id'] }}">
	    		 			<div class="champ-box">
	    		 				<img src="{{ $campeon['imagen'] }}">
	    		 					<div class="champ-info">
	    		 						{{ $campeon['nombre'] }}
	    		 					</div>
	    		 			</div>
	    		 		</a>
  					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
