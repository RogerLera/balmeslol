<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Objeto EstadisticasHechizo el qual tiene como atributo 'eshUsado' (visualizar
* el total de veces que un hechizo a sido seleccionado).
*/
class EstadisticasHechizo extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'eshId', 'eshUsado',
    ];
}
