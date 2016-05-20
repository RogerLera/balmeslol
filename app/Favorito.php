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

    /**
     * Obtenemos el usuario que le ha dado a favorito.
     *
     * @return usuario al que pertenece.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenemos la guia que a marcado como favorita.
     *
     * @return guia al que pertenece.
     */
    public function guia()
    {
        return $this->belongsTo(Guia::class);
    }
}
