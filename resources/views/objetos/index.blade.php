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
                                <li class="active">@lang('messages.Objetos')</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>@lang('messages.Obj-Busqueda')</p>
                                    <input type="text" id="buscarobjeto" class="form-control" placeholder="@lang('messages.Obj-Buscarobj')">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>@lang('messages.Obj-Filtro')</p>
                                    <table id="filtrarObjeto" class="table-custom">
                                        <tbody>
                                            <tr>
                                                <th>@lang('messages.Obj-Iniciales')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Jungla')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Jungle"></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('messages.Obj-Actividad')</td>
                                                <td><input type="checkbox" class="filtroObjeto" value="Lane"></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('messages.Obj-Herramientas')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Unuso')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Consumable"></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('messages.Obj-Oro')</td>
                                                <td><input type="checkbox" class="filtroObjeto" value="GoldPer"></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('messages.Obj-Vision')</td>
                                                <td><input type="checkbox" class="filtroObjeto" value="Vision"></td>
                                            </tr>
                                            <tr>
                                                <td>@lang('messages.Obj-Talismanes')</td>
                                                <td><input type="checkbox" class="filtroObjeto" value="Trinket"></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('messages.Obj-Defensa')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Vida')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Health"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Armadura')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Armor"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Rmagica')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="SpellBlock"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Rvida')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="HealthRegen"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Tenacidad')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Tenacity"></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('messages.Obj-Ataque')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Vataque')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="AttackSpeed"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Impcrit')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="CriticalStrike"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Daño')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Damage"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Robovida')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="LifeSteal"></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('messages.Obj-Magia')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Reduccion')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="CooldownReduction"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Mana')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Mana"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Rmana')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="ManaRegen"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Poderhabilidad')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="SpellDamage"></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('messages.Obj-Movimiento')</th>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Botas')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Boots"></td>
                                            </tr>
                                            <tr>
                                                    <td>@lang('messages.Obj-Otros')</td>
                                                    <td><input type="checkbox" class="filtroObjeto" value="Other"></td>
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
                                        @if (is_array($objeto['tags']))
                                            @foreach ($objeto['tags'] as $tags)
                                                <input type="hidden" name="tag" value="{{ $tags }}">
                                            @endforeach
                                        @else
                                            <input type="hidden" name="tag" value=" {{ $objeto['tags'] }}">
                                        @endif
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
