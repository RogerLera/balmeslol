<?php

namespace App\Http\Controllers\UsuarioAuth;

use App\Usuario;
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

    protected $guard = 'usuario';

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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'usuAlias' => $data['usuAlias'],
            'usuEmail' => $data['usuEmail'],
            'usuFdn' => $data['usuFdn'],
            'usuAvatar' => $data['usuAvatar'],
            'usuPswd' => bcrypt($data['usuPswd']),
        ]);
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

        return view('usuario.auth.inicioSesion');
    }

    /**
    * Método que lleva a la vista de registro.
    *
    * @return vista con el formuario.
    */
    public function formularioRegistro()
    {
        return view('usuario.auth.registro');
    }
}
