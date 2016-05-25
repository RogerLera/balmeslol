<?php
namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * Clase MensajeController que nos servira para gestionar los mensajes y mostrarlos. 
 */
class MensajeController extends Controller
{
    /**
     * Muestra todos los threads (conversaciones) de mensajes segun el usuario logeado.
     *
     * @return mixed
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
            $currentUserId = Auth::user()->id;
        }else{
            return redirect('/');
        }
        // Todos los threads (conversaciones), ignora los participantes borrados/archivados
        $threads = Thread::getAllLatest()->get();
        // Todos los threads (conversaciones) en que participa el usuario 
        // $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // Todos los threads (conversaciones) en que participa el usuario, con mensajes nuevos
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('messenger.index', compact('threads', 'currentUserId'));
    }
    /**
     * Muestra un thread (conversacion) de mensajes segun la id
     *
     * @param $id id del thread
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'No se encontró la conversación con la ID: ' . $id . '.');
            return redirect('mensajes');
        }
        // muestra el usuario actual en una lista si no es un participante actual
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // no mostrar el usuario actual en la lista
        if(isset(Auth::user()->id)){
            $userId = Auth::user()->id;
        }else{
            return redirect('/');
        }        
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        Carbon::setLocale('es');
        return view('messenger.show', compact('thread', 'users'));
    }
    /**
     * Crea un nuevo thread (conversacion) de mensajes.
     *
     * @return mixed
     */
    public function create()
    {
        if(!isset(Auth::user()->id)){
            return redirect('/');
        }
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messenger.create', compact('users'));
    }
    
    /**
     * Guarda un nuevo mensaje en un thread (conversacion) nuevo
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        // Thread nuevo
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Mensaje
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // El que lo envia
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // El/los que lo recibe
        if (Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }
        return redirect('mensajes');
    }
    
    /**
     * Añade un mensaje nuevo para el thread (conversacion) actual
     *
     * @param $id id del thread
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'No se encontró la conversación con la ID: ' . $id . '.');
            return redirect('mensajes');
        }
        $thread->activateAllParticipants();
        // Mensaje
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Añade un participante nuevo
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // El/los que lo recibe
        if (Input::has('recipients')) {
            $thread->addParticipants(Input::get('recipients'));
        }
        return redirect('mensajes/' . $id);
    }
}