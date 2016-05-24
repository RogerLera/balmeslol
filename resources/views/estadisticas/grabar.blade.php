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
                                <li class="active">Almacenar estadísticas</li>
                            </ul>
                        </div>
                        {{ $msj }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

