<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Guia;
use App\Role;
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
    public function __construct(GuiaRepository $guias)
    {
        $this->middleware('auth');
        $this->guias = $guias;
    }

    /**
	* Método principal que se llama al acceder a la pestanya guias.
	*
	* @return información guias a la vista.
	*/
	public function index()
	{
	    return view('guias.index', [
            'guias' => $this->guias->totalGuias(),
		]);
	}

    /**
	* Método que mustra una guia seleccionada.
	*
    * @param $id identificador
	* @return información completa de la guia.
	*/
	public function obtenerGuia($id)
	{
	    return view('guias.guia', [
            'guia' => Guia::findOrFail($id),
		]);
	}

    public function misGuias($id) {
        return view('guias.user', [
            'guias' => $this->guias->delUser($id),
        ]);
    }

    /**
    * Método que devuelve el formulario para crear una guia.
    *
    * @return información guias a la vista.
    */
    public function formularioCrearGuia()
    {
        return view('guias.crear', [
            //'campeones' => ControllerCampeon::obtenerCampeones(),
            'roles' => Role::orderBy('rolId', 'asc')->get(),
            'version' => $this->version(),
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
            'camId' => 'required',
            'rolId' => 'required',
            'usuId' => 'required',
            'guiHechizos' => 'max:1000',
            'guiRunas' => 'max:1000',
            'guiMaestrias' => 'max:1000',
            'guiHabilidades' => 'max:1000',
            'guiObjetos' => 'max:1000',
            'guiVersion' => 'required',
            'guiVersion' => 'required',
        ]);

        Guia::create(Input::all());

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
            'camId' => 'required',
            'rolId' => 'required',
            'usuId' => 'required',
            'guiHechizos' => 'max:1000',
            'guiRunas' => 'max:1000',
            'guiMaestrias' => 'max:1000',
            'guiHabilidades' => 'max:1000',
            'guiObjetos' => 'max:1000',
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

    public function version()
    {
        // Obtenemos el json.
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/versions?api_key=a9a09074-95bd-4038-addb-a8b5e616e9c6');
		// Lo transformamos a objetos que php pueda entender.
		$version = json_decode($json);
        // Devolvemos la última versión.
        return $version[0];
    }
}
