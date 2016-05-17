<?php

namespace App;

use App\Guia;
use App\Favorito;
use App\Mensaje;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
* Classe Usuario que representa a una persona, la qual puede hacer distintas cosas
* (iniciar sessión, enviar mensajes, crear guias, editar perfil, ...) en la web.
*/
class Usuario extends Authenticatable
{

    /**
    * Atributos de la classe que son assignables.
    *
    * @var $fillable: array con los valores que se pueden modificar.
    */
    protected $fillable = [
        'usuAlias', 'usuEmail', 'usuFdn', 'usuPswd',
    ];

    /**
    * Atributos ocultos.
    *
    * @var $hidden: array con los valores ocultos.
    */
    protected $hidden = [
        'usuPswd', 'remember_token',
    ];

    /**
    * Obtener todas las guias que el usuario a creado.
    *
    * @return todas las guias.
    */
    public function guias()
    {
        return $this->hasMany(Guia::class);
    }

    /**
    * Obtener todos los favoritos.
    *
    * @return todos los favoritos
    */
    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    /**
    * Obtener todos los mensajes.
    *
    * @return todos los mensajes
    */
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }
}
