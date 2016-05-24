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

class MensajeController extends Controller
{
    /**
     * Muestra todos los threads de mensajes segun el usuario logeado.
     *
     * @return mixed
     */
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // Todos los threads, ignora los participantes borrados/archivados
        $threads = Thread::getAllLatest()->get();
        // Todos los threads en que participa el usuario 
        // $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // Todos los threads en que participa el usuario, con mensajes nuevos
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('messenger.index', compact('threads', 'currentUserId'));
    }
    /**
     * Muestra un thread de mensajes segun la id
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
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messenger.show', compact('thread', 'users'));
    }
    /**
     * Crea un nuevo thread de mensajes.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messenger.create', compact('users'));
    }
    
    /**
     * Guarda un nuevo mensaje en un thread nuevo
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
     * Añade un mensaje nuevo para el thread actual
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