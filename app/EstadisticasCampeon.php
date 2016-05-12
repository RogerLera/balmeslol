<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Objeto EstadisticasCampeon el qual tiene como atributos 'escUsado' (visualizar
* el total de veces que un campeón a sido usado) i 'escBloqueado' (visualizar el
* total de veces que un campeón a sido bloqueado).
*/
class EstadisticasCampeon extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'escId', 'escUsado', 'escBloqueado',
    ];
}
