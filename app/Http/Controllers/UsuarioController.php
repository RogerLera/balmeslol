<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ObjecteRepository;
use DB;
use Illuminate\Support\ServiceProvider;

class UsuarioController extends Controller {

    /**
    * Constructor principal.
    */
    public function __construct(){
        $this->middleware('guest');
   }

    /**
     * Mostrar el perfil de un cierto usuario
     *
     * @param  int  $id
     * @return Respuesta
     */
    public function mostrarPerfil($id) {
        return view('usuarios.perfil', ['usuario' => Usuario::findOrFail($id)]);
    }

    public function editarUsuario(Usuario $usuario) {
        $this->authorize('permisoUsuario', $usuario);
        $usuario->usuAlias = $request->input('usuAlias');
        $usuario->usuEmail = $request->input('usuEmail');
        $usuario->usuFdn = $request->input('usuFdn');
        $file = Input::file('usuAvatar');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));
        $usuario->usuAvatar = $img;
        $usuario->usuPswd = $request->input('usuPswd');
        $usuario->save();
        return redirect('/');

        /* http://www.core45.com/using-database-to-store-images-in-laravel-5-1/
         * si apareixen problemes amb les imatges:
         tema composer no esta aclarat:
        $ composer require intervention/image
        See http://image.intervention.io/getting_started/installation
         */
    }

    /**
     * Eliminar el usuario especificado.
     * @param Request $request
     * @param Usuario $usuario
     * @return redireccionamento
     */
    public function eliminarUsuario(Usuario $usuario) {
        $this->authorize('permisoUsuario', $usuario);
        $usuario->delete();
        return redirect('/');
    }

    public function getAuthPassword()
    {
        return $this->usuPswd;
    }

}
