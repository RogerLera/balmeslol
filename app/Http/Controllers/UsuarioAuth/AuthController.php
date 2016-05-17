<?php

namespace App\Http\Controllers\UsuarioAuth;

use App\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

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
     * @param Autentificador $auth
     * @param Usuario $usuario
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'cerrarSesion']);
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
        Usuario::create([
            'usuAlias' => $request->usuAlias,
            'usuEmail' => $request->usuEmail,
            'usuFdn' => $request->usuFdn,
            'usuAvatar' => $request->usuAvatar,
            'usuPswd' => bcrypt($request->usuPswd),
        ]);
        return redirect('/');
    }

    /**
     * Método que comprueba que el usuario existe en la base de datos,
     * y inicia la sesión  en la web.
     *
     * @param  Request  $request
     * @return vista al inicio.
     */
    protected function inicioSesion(Request $request)
    {
        if (Auth::attempt(['usuAlias' => $request->usuAlias, 'usuPswd' => $request->usuPswd])) {
           return redirect('/');
       }

       return redirect('/usuario/inicioSesion')->withErrors([
           'usuAlias' => 'Los datos introducidos no coinciden con nuestros registros, intentalo de nuevo.',
       ]);
    }

    /**
     * Método para que el usuario se desconecte de la aplicación.
     *
     * @return Response
     */
    public function cerrarSesion()
    {
        $this->auth->logout();

        return redirect('/');
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
