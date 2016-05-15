<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Guia;
use App\Http\Requests;
use App\Repositories\GuiaRepository;

class GuiaController extends Controller
{
    /**
    * Instancia del objeto repositorio.
    *
    * @var GuiaRepository
    */
    protected $guias;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ObjecteRepository $guias)
    {
        $this->middleware('auth');
        $this->guias = $guias;
    }

    /**
	* Método principal que se llama al acceder a la pestanya guias.
	*
    * @param $request
	* @return información guias a la vista.
	*/
	public function index(Request $request)
	{
	    return view('guias.index', [
            'guias' => totalGuias(),
		]);
	}

    /**
	* Método que mustra una guia seleccionada.
	*
    * @param $id identificador
	* @return información completa de la guia.
	*/
	public function obtenirGuia($id)
	{
	    return view('guias.guia', [
            'guia' => Guia::findOrFail($id),
		]);
	}

    /**
     * Método que crea una guia nueva.
     *
     * @param Request $request datos a guardar.
     * @return redireccionamos a la página de sus guias.
     */
    public function crearGuia(Request $request)
    {
        $this->validate($request, [
            'guiTitulo' => 'required|max:100',
            'guiDescripcion' => 'required|max:1000',
            'camId' => 'required',
            'usuId' => 'required',
            'guiVersion' => 'required',
        ]);

        $guias->fill(Input::all());
        $guias->save();

        return redirect('/guias');
    }

    /**
     * Método que edita una guia existente.
     *
     * @param Request $request datos a editar.
     * @return redireccionamos a la página de sus guias.
     */
    public function editarGuia(Request $request)
    {
        $this->validate($request, [
            'guiTitulo' => 'required|max:100',
            'guiDescripcion' => 'required|max:1000',
            'camId' => 'required',
            'usuId' => 'required',
            'guiVersion' => 'required',
        ]);

        $guias = Guias::whereId($guias->id)->firstOrFail();
        $guias->fill(Input::all());
        $guias->save();

        return redirect('/guias');
    }

    /**
     * Método que elimina una guia existente.
     *
     * @param Request $request request.
     * @param $guia guia a eliminar.
     * @return redireccionamos a la página de sus guias.
     */
    public function eliminarGuia(Request $request, Guia $guia)
    {
        $this->authorize('destroy', $guia);

        $guia->delete();

        return redirect('/guias');
    }
}
