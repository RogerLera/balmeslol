<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Classe Usuario que representa a una persona, la qual puede hacer distintas cosas
* (iniciar sessión, enviar mensajes, crear guias, editar perfil, ...) en la web.
*/
class Usuario extends Model
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
}
