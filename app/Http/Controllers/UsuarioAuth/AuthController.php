<?php

namespace App\Http\Controllers\UsuarioAuth;

use App\Usuario;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $guard = 'web';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuAlias' => 'required|max:255',
            'usuEmail' => 'required|email|max:255|unique:usuarios',
            'usuFdn' => 'date|date_format:"d/m/Y"',
            'usuAvatar' => 'image|mimes:jpg',
            'usuPswd' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Método que registra un usuario en la base de datos.
     *
     * @param  Request  $request
     * @return vista al inicio.
     */
    protected function registro(Request $request)
    {
        return Usuario::create([
        'usuAlias' => $request->usuAlias,
        'usuEmail' => $request->usuEmail,
        'usuFdn' => $request->usuFdn,
        'usuAvatar' => $request->usuAvatar,
        'usuPswd' => bcrypt($request->usuPswd),
        ]);
        return view('/');
    }

    /**
    * Método que lleva a la vista de iniciar sesión.
    *
    * @return vista con el formuario.
    */
    public function formularioInicioSesion()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('usuarios.auth.inicioSesion');
    }

    /**
    * Método que lleva a la vista de registro.
    *
    * @return vista con el formuario.
    */
    public function formularioRegistro()
    {
        return view('usuarios.auth.registro');
    }
}
