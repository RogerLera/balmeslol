<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
