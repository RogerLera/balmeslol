@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body-min">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="/perfil/{{ Auth::id() }}/editar">Editar perfil</a>
                        </div>
                        <div class="col-md-8">
                            <h2 class="text-left">Perfil de {{ Auth::user()->usuAlias }}</h2>
                        </div>
                    <hr />
                    <p class="text-center">Alias: <b>{{ Auth::user()->usuAlias }}</b></p>
                    <p class="text-center">Avatar: <img src="/perfil/{{ Auth::id() }}/avatar" class="avatarPerfil" alt="Avatar usuario"></p>
                    <p class="text-center">Fecha nacimiento: <b>{{ Auth::user()->usuFdn }}</b></p>
                    <p class="text-center">E-Mail: <b>{{ Auth::user()->email }}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
