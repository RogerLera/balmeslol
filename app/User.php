<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guia;
use App\Favorito;
use App\Message;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
     use Messagable;
    /**
    * Atributos de la classe que son assignables.
    *
    * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'usuAlias', 'email', 'usuFdn', 'usuAvatar', 'password',
    ];

    /**
    * Atributos ocultos.
    *
    * @var $hidden: array con los valores ocultos.
     */
    protected $hidden = [
        'password', 'remember_token',
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
    public function favorito()
    {
        return $this->hasOne(Favorito::class, 'usuId');
    }

    /**
    * Obtener todos los mensajes.
    *
    * @return todos los mensajes
    */
    public function message()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Obtiene las votaciones que ha realizado el usuario
     * 
     * @return type las votaciones realizadas
     */
    public function votacions()
    {
        return $this->belongsToMany(Guia::class, 'votacions', 'usuId', 'guiId');
    }
}
