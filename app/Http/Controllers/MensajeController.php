<?php

use App\Mensaje;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ObjecteRepository;
use DB;
use Illuminate\Support\ServiceProvider;

class MensajeController extends Controller {

    /**
     * Instancia al repositorio de mensajes.
     *
     * @var MensajeRepository
     */
    protected $mensajes;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(MensajeRepository $mensajes) {
        $this->middleware('auth');
        $this->mensajes = $mensajes;
    }

    /**
     * Muestra los mensajes del usuario en una lista
     * Actua como mostrador de bandeja de entrada
     * @param  Request  $request
     * @return Response
     */
    public function entrada(Request $request) {
        return view('mensajes.index', [
            'mensajes' => $this->mensajes->recibidos($request->usuario()),
        ]);
    }

    /**
     * Muestra los mensajes del usuario en una lista
     * Actua como mostrador de bandeja de entrada
     * @param  Request  $request
     * @return Response
     */
    public function salida(Request $request) {
        return view('mensajes.index', [
            'mensajes' => $this->mensajes->enviados($request->usuario()),
        ]);
    }
    
    /**
     * Obtenemos un mensaje en cuestion para mostrarlo
     * @param type $id
     */
    public function obtenerMensaje($id) {
        return view('mensajes.mensaje', ['mensaje' => Mensaje::findOrFail($id)]);
    }

    /**
     * Crea un mensaje nuevo
     *
     * @param  Request  $request
     * @return Response
     */
    public function crearMensaje(Request $request)
    {
        $this->validate($request, [
            'menDestino' => 'required',
            'menTexto' => 'required|max:255',
        ]);
        $request->usuario()->mensajes()->create([
            'menEmisor' => $request->usuario()->usuId,
            'menDestino' => $request->menDestino,
            'menTexto' => $request->menTexto,
            
        ]);
        return redirect('/mensajes');
    }

    /**
     * Eliminar el mensaje especificado.
     * @param Request $request
     * @param Usuario $usuario
     * @return redireccionamento 
     */
    public function eliminarMensaje(Mensaje $mensaje) {
        $this->authorize('borrar', $mensaje);
        $mensaje->delete();
        return redirect('/mensajes');
    }

}
