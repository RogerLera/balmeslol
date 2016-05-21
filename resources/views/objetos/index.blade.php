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
                                <li class="active">Objetos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Escribe el nombre del objeto que quieras buscar</p>
                                    <input type="text" id="buscarobjeto" class="form-control" placeholder="Buscar objeto">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Filtrar objetos</p>
                                    <table class="table-custom">
                                        <tbody>
                                            <tr>
                                                <th>Objetos iniciales</th>
                                            </tr>
                                            <tr>
                                                    <td>Jungla</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Jungle"></td>
                                            </tr>
                                            <tr>
                                                <td>Actividad en las calles</td>
                                                <td><input type="checkbox" id="filtrarobjeto" value="Lane"></td>
                                            </tr>
                                            <tr>
                                                <th>Herramientas</th>
                                            </tr>
                                            <tr>
                                                    <td>De un solo uso</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Consumable"></td>
                                            </tr>
                                            <tr>
                                                <td>Ganancias de Oro</td>
                                                <td><input type="checkbox" id="filtrarobjeto" value="GoldPer"></td>
                                            </tr>
                                            <tr>
                                                <td>Visión</td>
                                                <td><input type="checkbox" id="filtrarobjeto" value="Vision"></td>
                                            </tr>
                                            <tr>
                                                <td>Talismanes</td>
                                                <td><input type="checkbox" id="filtrarobjeto" value="Trinket"></td>
                                            </tr>
                                            <tr>
                                                <th>Defensa</th>
                                            </tr>
                                            <tr>
                                                    <td>Vida</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Health"></td>
                                            </tr>
                                            <tr>
                                                    <td>Armadura</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Armor"></td>
                                            </tr>
                                            <tr>
                                                    <td>Resistencia mágica</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="SpellBlock"></td>
                                            </tr>
                                            <tr>
                                                    <td>Regeneración de vida</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="HealthRegen"></td>
                                            </tr>
                                            <tr>
                                                    <td>Tenacidad</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Tenacity"></td>
                                            </tr>
                                            <tr>
                                                <th>Ataque</th>
                                            </tr>
                                            <tr>
                                                    <td>Velocidad de ataque</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="AttackSpeed"></td>
                                            </tr>
                                            <tr>
                                                    <td>Impacto crítico</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="CriticalStrike"></td>
                                            </tr>
                                            <tr>
                                                    <td>Daño</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Damage"></td>
                                            </tr>
                                            <tr>
                                                    <td>Robo de vida</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="LifeSteal"></td>
                                            </tr>
                                            <tr>
                                                <th>Magia</th>
                                            </tr>
                                            <tr>
                                                    <td>Reducción de enfriamiento</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="CooldownReduction"></td>
                                            </tr>
                                            <tr>
                                                    <td>Maná</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Mana"></td>
                                            </tr>
                                            <tr>
                                                    <td>Regeneración de maná</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="ManaRegen"></td>
                                            </tr>
                                            <tr>
                                                    <td>Poder de habilidad</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="SpellDamage"></td>
                                            </tr>
                                            <tr>
                                                <th>Movimiento</th>
                                            </tr>
                                            <tr>
                                                    <td>Botas</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Boots"></td>
                                            </tr>
                                            <tr>
                                                    <td>Otros objetos</td>
                                                    <td><input type="checkbox" id="filtrarobjeto" value="Other"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 scroll">
                             @foreach($objetos as $objeto)
                                <a href="/objetos/{{ $objeto['id'] }}">
                                    <div class="object-box">
                                        <img src="{{ $objeto['imagen'] }}">
                                        <div class="object-info">
                                            {{ $objeto['nombre'] }}
                                        </div>
                                        <!--Comprovamos las etiquetas de los objetos-->
                                        <!-- HACER UN FOREACH DE TAGS $objeto[tags] as $tag da error falta arreglarlo -->
                                            <input type="hidden" name="tag" value="{{ $objeto['tags'][0]}}">
                                        
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
