<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;
use Response;
use Intervention\Image\Facades\Image;

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

    public function editarUser(Request $request, $id)
    {
        $user = User::whereId($id)->firstOrFail();
        $this->validate($request, [
            'usuAlias' => 'required|max:255|unique:users,usuAlias,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'usuFdn' => 'date|date_format:Y-n-j',
            'usuAvatar' => 'image',
        ]);
        $user = User::whereId($user->id)->firstOrFail();
        $user->fill(Input::except('usuAvatar'));
        if (isset($request->usuAvatar)) {
            $file = $request->usuAvatar;
            $avatar = Image::make($file);
            Response::make($avatar->encode('jpeg'));
            $user->usuAvatar = $avatar;
        }
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

    /**
    * Método que carga la imagen binaria de la base de datos.
    * @param id identificador usuario.
    * @return $response con la imagen.
    */
    public function mostrarAvatar($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $avatar = Image::make($user->usuAvatar);
        $response = Response::make($avatar->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

}
