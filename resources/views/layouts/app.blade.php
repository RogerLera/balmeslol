<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Balmeslol - Home</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo asset('bootstrap/css/bootstrap.css')?>" type="text/css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    <div class="container">
        <div class="row banner">
            <div class="col-md-6 col-md-offset-6" style="padding-top:30px;">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar jugador">
                        <select class="selectpicker" data-width="fit">
                            <option data-subtext="EU Oeste" value="euw">EUW</option>
                            <option data-subtext="EU Nórdica y Este" value="eune">EUNE</option>
                            <option data-subtext="Norteamérica" value="na">NA</option>
                            <option data-subtext="Latinoamérica Norte" value="lan">LAN</option>
                            <option data-subtext="Latinoamérica Sur" value="las">LAS</option>
                            <option data-subtext="Brasil" value="br">BR</option>
                            <option data-subtext="Japón" value="jap">JAP</option>
                            <option data-subtext="Rusia" value="ru">RU</option>
                            <option data-subtext="Turquía" value="tr">TR</option>
                            <option data-subtext="Oceanía" value="oce">OCE</option>
                            <option data-subtext="Republica de Corea" value="kr">KR</option>
                        </select>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <!-- Guias menú -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Guías de campeones<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">
                                        Guías de campeones
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Todas las guías</a>
                                    </li>
                                    <li>
                                        <a href="#">Nuevo</a>
                                    </li>
                                    <li>
                                        <a href="#">Popular</a>
                                    </li>
                                    <li>
                                        <a href="#">Más votado</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Campeones menú -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Campeones<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">
                                        Campeones
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/campeones') }}">Todos los campeones</a>
                                    </li>
                                    <li>
                                        <a href="#">Últimos campeones</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Objetos menú -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Objetos<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">
                                        Objetos
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Todos los objetos</a>
                                    </li>
                                    <li>
                                        <a href="#">Últimos objetos</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Estadísticas menú -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Estadísticas<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">
                                        Estadísticas
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Popularidad de campeones</a>
                                    </li>
                                    <li>
                                        <a href="#">Popularidad de hechizos</a>
                                    </li>
                                    <li>
                                        <a href="#">Bloqueo de campeones</a>
                                    </li>
                                    <li>
                                        <a href="#">Ratio de victorias</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                           <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li>
                                    <a href="{{ url('/login') }}">Iniciar</a>
                                </li>
                                <li>
                                    <a href="{{ url('/register') }}">Registrarse</a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img src="/perfil/{{ Auth::user()->id }}/avatar" alt="Avatar usuario"> {{ Auth::user()->usuAlias }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/perfil/{{ Auth::user()->id }}"><i class="fa fa-btn fa-user"></i> Perfil</a></li>
                                        <li><a href="/guias/favoritos"><i class="fa fa-btn fa-star"></i> Guias favoritas</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Desconectarse</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div><!--/.row -->
    </div><!--/.container -->
    @yield('content')
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script src="<?php echo asset('js/myjsfunctions.js')?>"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
