<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Clase que representa el tipo de votación echa por un usuario de una guia.
* 0 -> No me gusta; 1 -> Me gusta.
*/
class Votacion extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'usuId', 'guiId', 'votValoracion',
    ];
}
