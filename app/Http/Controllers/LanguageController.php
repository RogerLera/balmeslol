<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Clase LanguageController se encarga de cambiar el idioma en el app.blade.php, 
 * para guardarlo en sesión
 */
class LanguageController extends Controller
{
    
    /**
     * Método que se encargara del cambio de lenguaje del sitio web y lo guardarà en sesión
     * 
     * @param type $lang idioma al que cambiara
     * @return type redirecciona al usuario para obtener el mismo sitio donde estaba pero con el lenguaje elegido
     */
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::set('applocale', $lang);
        }
        return Redirect::back();
    }
}
