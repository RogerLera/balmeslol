<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
* Clase para comprovar si es un usuario válido.
*/
class RedirectIfNotUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'usuario')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
?>
