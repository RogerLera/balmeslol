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
     *
     *  public function __construct() {
     *     $this->middleware('auth');
     * }
     **/

    /**
     * Mostrar un perfil
     *
     * @param  int  $id
     * @return información usuario a la vista
     */
    public function mostrarPerfil($id)
    {
        return view('users.perfil', [
            'usuario' => User::whereId($id)->firstOrFail(),
        ]);
    }

    /**
     * Redireccionar al formulario para editar información del usuario.
     *
     * @param  int  $id
     * @return Respuesta
     */
    public function formularioEditarUser($id) {
        return view('users.editar');
    }

    /**
     * Método para cambiar los datos del usuario.
     * 
     * @param Request $request datos del input
     * @param type $id id del usuario a cambiar
     * @return type redireccionamento
     */
    public function editarUser(Request $request, $id) {
        $user = User::whereId($id)->firstOrFail();
        $this->validate($request, [
            'usuAlias' => 'required|min:2|max:25|unique:users,usuAlias,' . $user->id,
            'email' => 'required|email|min:2|max:35|unique:users,email,' . $user->id,
            'usuFdn' => 'date|date_format:Y-n-j',
            'usuAvatar' => 'dimensions:max_width=350,max_height=350',
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
        return redirect('/perfil/$id');
    }

    /**
     * Método para cambiar el password del usuario.
     * 
     * @param Request $request nuevo password
     * @param type $id id del usuario a editar
     * @return type redireccionamento
     */
    public function editarUserPassword(Request $request, $id) {
        $user = User::whereId($id)->firstOrFail();
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::whereId($id)->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/perfil/$id');
    }

    /**
     * Eliminar el user especificado.
     * 
     * @param Request $request
     * @param User $user
     * @return redireccionamento
     */
    public function eliminarUser(User $user) {
        $this->authorize('permisoUser', $user);
        $user->delete();
        return redirect('/');
    }

    /**
     * Método que carga la imagen binaria de la base de datos.
     * 
     * @param id identificador usuario.
     * @return $response con la imagen.
     */
    public function mostrarAvatar($id) {
        $user = User::whereId($id)->firstOrFail();
        $avatar = Image::make($user->usuAvatar);
        $response = Response::make($avatar->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

}
