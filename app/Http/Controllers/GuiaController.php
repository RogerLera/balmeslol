<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Guia;
use App\Role;
use App\Votacion;
use App\Http\Requests;
use App\Repositories\GuiaRepository;
use App\Traits\TraitCampeones;
use App\Traits\TraitHechizos;
use App\Traits\TraitRunas;
use App\Traits\TraitVersionActual;
use App\Traits\TraitObjetos;

/**
* Clase GuiaController que es la que se encarga de redirecionar a las vistas adecuadas
* para las guias y verificar que los datos pasan la validación correcta antes de guardarlos.
*
*/
class GuiaController extends Controller {

    // Clases de las quales usamos sus métodos como si fueran de la misma clase (con un $this).
    use TraitCampeones, TraitHechizos, TraitRunas, TraitObjetos, TraitVersionActual;

    /**
     * Instancia del objeto repositorio.
     *
     * @var GuiaRepository
     */
    protected $guias;

    /**
     * Crear nueva instancia del controlador.
     *
     * @param GuiaRepository
     * @return void
     */
    public function __construct(GuiaRepository $guias) {
        $this->guias = $guias;
    }

    /**
     * Método principal que se llama al acceder a la pestanya guias.
     *
     * @return todas las guias que existen en la base de datos a la vista.
     */
    public function index(Request $request) {
        return view('guias.index', [
            'guias' => $this->guias->totalGuias(),
        ]);
    }

    /**
     * Método que mustra una guia seleccionada, dependiendo de si es el usuario que
     * la a creado o no, se le enviará a una vista u otra (editable o solo lectura).
     *
     * @param $id identificador
     * @return información completa de la guia.
     */
    public function obtenerGuia(Request $request, $id) {
        $guia = Guia::findOrFail($id);
        $vista = 'guias.guia';
        if (isset($request->user()->id) && $request->user()->id == $guia->user->id) {
            $vista = 'guias.editar';
        }
        return view($vista, [
            'guia' => Guia::findOrFail($id),
            'version' => $this->version(),
        ]);
    }

    /**
     * Método que devuelve las guías que ha creado el usuario logueado por su id.
     *
     * @param type $id id del usuario
     * @return vista resumida de sus guias
     */
    public function misGuias($id) {
        return view('guias.user', [
            'guias' => $this->guias->delUser($id),
        ]);
    }

    /**
     * Método que devuelve el formulario para crear una guia.
     *
     * @return vista con la info necesaria para poder crearlas.
     */
    public function formularioCrearGuia() {
        return view('guias.crear', [
            'campeones' => $this->obtenerCampeones(),
            'roles' => Role::orderBy('rolId', 'asc')->get(),
            'version' => $this->version(),
        ]);
    }

    /**
     * Método que valida y registra una guia nueva a la base de datos.
     *
     * @param Request $request datos a guardar.
     * @return redireccionamos a la página de sus guias.
     */
    public function crearGuia(Request $request) {
        $this->validate($request, [
            'guiTitulo' => 'required|max:100',
            'camNombre' => 'required',
            'rolId' => 'required',
            'usuId' => 'required',
            'guiHechizos' => 'max:2000',
            'guiRunas' => 'max:2500',
            'guiHabilidades' => 'max:3000',
            'guiObjetos' => 'max:3000',
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
    public function editarGuia(Request $request, $id) {
        $this->validate($request, [
            'guiTitulo' => 'required|max:100',
            'camNombre' => 'required',
            'rolId' => 'required',
            'usuId' => 'required',
            'guiHechizos' => 'max:2000',
            'guiRunas' => 'max:2500',
            'guiHabilidades' => 'max:3000',
            'guiObjetos' => 'max:3000',
            'guiVersion' => 'required',
        ]);

        $guia = Guia::whereId($id)->firstOrFail();
        $guia->fill(Input::all());
        $guia->save();

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

    /**
    * Método que muestra todas las guias que el usuario tiene añadidas a favoritos.
    *
    * @param $id identificador usuario.
    * @return vista con las guias que tiene como favoritas.
    */
    public function obtenerGuiasFavoritos($id)
    {
        return view('guias.favoritos', [
            'guias' => $this->guias->guiasFavoritas($id),
        ]);
    }

    public function actualizarValoracion()
    {
        $guiId = Input::get('guiId');
        $tipo = Input::get('tipo');
        $esNuevo = Input::get('esNuevo');
        $valoracion = array();
        $guia = Guia::whereId($guiId)->firstOrFail();
            if ($esNuevo == 0) {
                if ($tipo == 1) {
                $valoracion[0] = $guia->guiPositivo = ($guia->guiPositivo + 1);
                $valoracion[1] = $guia->guiNegativo;
                } else {
                    $valoracion[0] = $guia->guiPositivo;
                    $valoracion[1] = $guia->guiNegativo = ($guia->guiNegativo + 1);
                }
            } else if ($esNuevo == 1) {
                if ($tipo == 1) {
                $valoracion[0] = $guia->guiPositivo = ($guia->guiPositivo + 1);
                $valoracion[1] = $guia->guiNegativo = ($guia->guiNegativo - 1);
                } else {
                    $valoracion[0] = $guia->guiPositivo = ($guia->guiPositivo - 1);
                    $valoracion[1] = $guia->guiNegativo = ($guia->guiNegativo + 1);
                }
            } else {
                $valoracion[0] = $guia->guiPositivo;
                $valoracion[1] = $guia->guiNegativo;
            }
        $guia->save();
        return $valoracion;
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
