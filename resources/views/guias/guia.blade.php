@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $guia->guiTitulo }}</div>
                <div class="panel-body">
                    <!-- Campeones -->
                    <div class="row">
                        <label class="col-md-3 col-md-offset-3 control-label">Campeón</label>

                        <div class="col-md-4">
                            <input type="text" value="{{ $guia->camNombre }}" readonly />
                        </div>
                    </div>

                    <!-- Roles -->
                    <div class="row">
                        <label class="col-md-3 col-md-offset-3 control-label">Rol</label>

                        <div class="col-md-4">
                            <input type="text" value="{{ $guia->role->rolNombre }}" readonly />
                        </div>
                    </div>

                    <!-- Versión -->
                    <div class="row">
                        <label class="col-md-3 col-md-offset-3 control-label">Versión</label>

                        <div class="col-md-4">
                            <input type="text" value="{{ $guia->guiVersion }}" readonly />
                        </div>
                    </div>

                    <!-- Usuario de la guia -->
                    <div class="row">
                        <label class="col-md-3 col-md-offset-3 control-label">Usuario</label>

                        <div class="col-md-4">
                            <input type="text" value="{{ $guia->user->usuAlias }}" readonly />
                        </div>
                    </div>

                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <div class="panel-group" id="accordion">
                            <!-- Hechizos -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            Hechizos</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div>
                                        <textarea class="form-control visualizarGuia" name="guiHechizos">{{ $guia->guiHechizos }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Runas -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            Runas</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div>
                                        <textarea class="form-control visualizarGuia" name="guiRunas">{{ $guia->guiRunas }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Habilidades -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Habilidades</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div>
                                        <textarea class="form-control visualizarGuia" name="guiHabilidades">{{ $guia->guiHabilidades }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Objetos -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Objetos</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div>
                                        <textarea class="form-control visualizarGuia" name="guiObjetos">{{ $guia->guiObjetos }}</textarea>
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
