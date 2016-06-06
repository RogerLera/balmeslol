<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Balmeslol - Your guide</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo asset('bootstrap/css/bootstrap.css') ?>" type="text/css">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    </head>
    <body id="app-layout">
        <div class="container-fluid">
                <div class="row banner">
                    <div class="col-md-6 col-md-offset-6 col-xs-6 col-xs-offset-6" style="padding-top:30px;">
                        <form class="navbar-form navbar-right"  accept-charset="ISO-8859-1" role="search" action="/invocador">
                            <div class="form-group">
                                <input name="nombre" type="text" class="form-control" placeholder="@lang('messages.Buscarjugador')">
                                <select class="selectpicker" data-width="fit" name="region">
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
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{ url('/') }}">Balmeslol</i></a>
                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <!-- Guias menú -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        @lang('messages.Guias-titulo')<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-header">
                                            @lang('messages.Guias-titulo')
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ url('/guias') }}">@lang('messages.Guias-todas')</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/guias/nuevas') }}">@lang('messages.Guias-nuevo')</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/guias/masVotadas') }}">@lang('messages.Guias-votado')</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Campeones menú -->
                                <li>
                                    <a href="{{ url('/campeones') }}">@lang('messages.Campeones')</a>
                                </li>
                                <!-- Objetos menú -->
                                <li>
                                    <a href="{{ url('/objetos') }}">@lang('messages.Objetos')</a>
                                </li>
                                <!-- Hechizos menú -->
                                <li>
                                    <a href="{{ url('/hechizos') }}">@lang('messages.Hechizos')</a>
                                </li>
                                <!-- Estadísticas menú -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        @lang('messages.Esta-titulo')<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-header">
                                             @lang('messages.Esta-titulo')
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="/estadisticas/popularidad_campeones">@lang('messages.Esta-popcampeones')</a>
                                        </li>
                                        <li>
                                            <a href="/estadisticas/popularidad_hechizos">@lang('messages.Esta-pophechizos')</a>
                                        </li>
                                        <li>
                                            <a href="/estadisticas/bloqueo_campeones">@lang('messages.Esta-bloqueocampeones')</a>
                                        </li>
                                         @if (Auth::id() === 1)
                                        <li>
                                            <a href="/estadisticas/genera">@lang('messages.Esta-generar')</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <!--Idioma-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        @lang('messages.Idioma')<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach (Config::get('languages') as $lang => $language)
                                            @if ($lang != App::getLocale())
                                                <li>
                                                    <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                <li>
                                    <a href="{{ url('/login') }}">@lang('messages.Iniciar')</a>
                                </li>
                                <li>
                                    <a href="{{ url('/register') }}">@lang('messages.Registrar')</a>
                                </li>
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img src="/perfil/{{ Auth::id() }}/avatar" class="profile" alt="Avatar usuario"> {{ Auth::user()->usuAlias }} @include('messenger.unread-count')<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/perfil/{{ Auth::id() }}"><i class="fa fa-btn fa-user"></i> @lang('messages.Usu-perfil')</a></li>
                                        <li><a href="{{URL::to('mensajes')}}"><i class="fa fa-btn fa-envelope"></i> @lang('messages.Usu-mensajes') @include('messenger.unread-count')</a></li>
                                        <li><a href="{{URL::to('mensajes/crear')}}"><i class="fa fa-btn fa-envelope"></i> @lang('messages.Usu-nmensaje')</a></li>
                                        <li><a href="/guias/usuario"><i class="fa fa-btn fa-star"></i> @lang('messages.Usu-misguias')</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> @lang('messages.Usu-desconectarse')</a></li>
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
        <div class="container footer-text footer-balmeslol">
            <div class="row">
                <div class="col-md-12">
                    <p>@lang('messages.copyright')</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><a href="http://www.twitter.com"><img src="{{asset('/images/twitter.16x16.png')}}"></a><a href="http://www.facebook.com"><img src="{{asset('/images/facebook.16x16.png') }}"></a><a href="http://www.instagram.com"><img src="{{asset('/images/instagram.16x16.png') }}"></a></p>
                </div>
            </div>
            <div class="row footer-balmeslol2">
                <div class="col-md-12 ">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> @lang('messages.contactanos'): Administrador@balmeslol.com</p>
                </div>
            </div>
        </div>
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="<?php echo asset('js/tinymce.js') ?>"></script>
        <script src="<?php echo asset('js/votacionGuias.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.tablesorter.min.js') ?>"></script>
        <script src="<?php echo asset('js/myjsfunctions.js') ?>"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
