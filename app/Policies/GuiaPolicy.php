<?php
namespace App\Policies;

use App\User;
use App\Guia;
use Illuminate\Auth\Access\HandlesAuthorization;
class GuiaPolicy
{
    use HandlesAuthorization;
    /**
     * Determinamos si la guia especificado se puede borrar por la persona que lo intenta.
     *
     * @param  User $user usuario que quiere realizar la acción
     * @param  User $userABorrar usuario que se quiere borrar
     * @return bool
     */
    public function borrarGuia(User $user, Guia $guia)
    {

        return $user->id === $guia->usuId || $user->id === 1;
    }
}
