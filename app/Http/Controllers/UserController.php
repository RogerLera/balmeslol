<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;
use Response;

class UserController extends Controller {

    /**
    * Constructor principal.
    */
    public function __construct(){
        $this->middleware('auth');
   }

    /**
     * Mostrar el perfil de un cierto user
     *
     * @param  int  $id
     * @return Respuesta
     */
    public function mostrarPerfil($id)
    {
        return view('users.perfil');
    }

    /**
     * Redireccionar al formulario para editar información del usuario.
     *
     * @param  int  $id
     * @return Respuesta
     */
    public function formularioEditarUser($id)
    {
        return view('users.editar');
    }

    public function editarUser(Request $request, User $user)
    {
        $this->authorize('permisoUser', $user, $request);
        //$user->usuAlias = $request->input('usuAlias');
        //$user->email = $request->input('email');
        //$user->usuFdn = $request->input('usuFdn');
        //$file = Input::file('usuAvatar');
        //$img = Image::make($file);
        //Response::make($img->encode('jpeg'));
        //$user->usuAvatar = $img;
        //$user->password = $request->input('password');
        //$user->save();
        $this->validate($request, [
            'usuAlias' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'usuFdn' => 'date|date_format:"Y/m/d"',
            'usuAvatar' => 'image',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::whereId($user->id)->firstOrFail();
        $user->fill(Input::except('usuAvatar'));
        $user->save();
        return redirect('/');

        /* http://www.core45.com/using-database-to-store-images-in-laravel-5-1/
         * si apareixen problemes amb les imatges:
         tema composer no esta aclarat:
        $ composer require intervention/image
        See http://image.intervention.io/getting_started/installation
         */
    }

    /**
     * Eliminar el user especificado.
     * @param Request $request
     * @param User $user
     * @return redireccionamento
     */
    public function eliminarUser(User $user)
    {
        $this->authorize('permisoUser', $user);
        $user->delete();
        return redirect('/');
    }

    public function mostrarAvatar($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $response = Response::make($user->usuAvatar, 200);
        $response->header('Content-Type', 'image/jpeg');
        return view('users.perfil', [
            'user' => $response,
        ]);
    }

}
