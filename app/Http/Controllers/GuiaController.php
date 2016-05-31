<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Guia;
use App\Role;
use App\Http\Requests;
use App\Repositories\GuiaRepository;
use App\Traits\TraitCampeones;
use App\Traits\TraitHechizos;
use App\Traits\TraitRunas;
use App\Traits\TraitVersionActual;
use App\Traits\TraitObjetos;

class GuiaController extends Controller {

    use TraitCampeones, TraitHechizos, TraitRunas, TraitObjetos, TraitVersionActual;

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
    public function __construct(GuiaRepository $guias) {
        $this->guias = $guias;
    }

    /**
     * Método principal que se llama al acceder a la pestanya guias.
     *
     * @return información guias a la vista.
     */
    public function index() {
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
    public function obtenerGuia($id) {
        return view('guias.guia', [
            'guia' => Guia::findOrFail($id),
        ]);
    }

    /**
     * Método que devuelve las guías que ha creado el usuario logueado por su id.
     *
     * @param type $id id del usuario
     * @return type vista de las guias
     */
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
    public function formularioCrearGuia() {
        return view('guias.crear', [
            'campeones' => $this->obtenerCampeones(),
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
    public function crearGuia(Request $request) {
        $this->validate($request, [
            'guiTitulo' => 'required|max:100',
            'camId' => 'required',
            'rolId' => 'required',
            'usuId' => 'required',
            'guiHechizos' => 'max:2000',
            'guiRunas' => 'max:2500',
            'guiHabilidades' => 'max:3000',
            'guiObjetos' => 'max:3000',
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
    public function editarGuia(Request $request) {
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
    public function eliminarGuia(Request $request, Guia $guia) {
        $this->authorize('destroy', $guia);

        $guia->delete();

        return redirect('/guias');
    }

    public function mostrarHechizosPopUp()
    {
        return view('guias.hechizos', [
            'hechizos' => $this->obtenerHechizos(),
        ]);
    }

    public function mostrarCampeonesPopUp()
    {
        return view('guias.campeones', [
            'campeones' => $this->obtenerCampeones(),
        ]);
    }

    public function mostrarRunasPopUp()
    {
        return view('guias.runas', [
            'runas' => $this->obtenerRunas(),
        ]);
    }

    public function mostrarObjetosPopUp()
    {
        return view('guias.objetos', [
            'objetos' => $this->obtenerObjetos(),
        ]);
    }

    public function mostrarHabilidadesPopUp($id)
    {
        return view('guias.habilidades', [
            'habilidades' => $this->obtenerHabilidadesCampeon($id),
        ]);
    }

}
