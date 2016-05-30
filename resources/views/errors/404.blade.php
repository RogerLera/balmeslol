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
                                    <li class="active">Página de error</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img style="width:30%;" src="{{asset('/images/alertwarning') }}.png">
                                        </div>
                                        <div class="col-md-10">
                                            <p>Error 404, la página solicitada no existe.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
