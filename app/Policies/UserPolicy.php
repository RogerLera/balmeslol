<?php
namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Determinamos si el usuario especificado se puede borrar por la persona que lo intenta.
     *
     * @param  User $user usuario que quiere realizar la acción
     * @param  User $userABorrar usuario que se quiere borrar
     * @return bool
     */
    public function permisoUser(User $user, User $userABorrar)
    {
        //el admin tiene id 1
        return $user->id === $userABorrar->id || $user->id === 1;
    }
}
