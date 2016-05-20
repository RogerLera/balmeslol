<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
* Classe Mensaje que guarda los distintos mensajes enviados de un usuario a otro.
*/
class Mensaje extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'menEmisor', 'menDestino', 'menTexto',
    ];

    /**
     * Obtenemos el usuario que a enviado el mensaje.
     *
     * @return usuario al que pertenece.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
