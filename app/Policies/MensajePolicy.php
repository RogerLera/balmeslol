<?php
namespace App\Policies;
use App\Mensaje;
use Illuminate\Auth\Access\HandlesAuthorization;
class MensajePolicy
{
    use HandlesAuthorization;
    /**
     * Determinamos si el usuario especificado puede borrar el mensaje.
     * Solo puede borrar los mensajes recibidos
     * 
     * @param  Usuario $usuario  usuario que quiere realizar la acción
     * @param  Mensaje $mensaje mensaje en el que trabajamos
     * @return bool
     */
    public function borrar(Usuario $usuario, Mensaje $mensaje)
    {
        //el admin tiene id 1
        return $usuario->id === $mensaje->menDestino || $usuario->id === 1;
    }
}