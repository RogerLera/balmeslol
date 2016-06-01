<?php

namespace App;

use App\User;
use App\Guia;
use Illuminate\Database\Eloquent\Model;

/**
* Classe Favorito en la que se almazenan las guias que a un usuario le han gustado.
*/
class Favorito extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'usuId', 'guiId',
    ];
}
