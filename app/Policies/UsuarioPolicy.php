<?php
namespace App\Policies;
use App\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;
class UsuarioPolicy
{
    use HandlesAuthorization;
    /**
     * Determinamos si el usuario especificado se puede borrar por la persona que lo intenta.
     *
     * @param  Usuario $usuario usuario que quiere realizar la acción
     * @param  Usuario $usuarioABorrar usuario que se quiere borrar
     * @return bool
     */
    public function permisoUsuario(Usuario $usuario, Usuario $usuarioABorrar)
    {
        //el admin tiene id 1
        return $usuario->id === $usuarioABorrar->id || $usuario->id === 1;
    }
}