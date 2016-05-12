<?php

namespace App\Repositories;

use App\Usuario;

class MensajeRepository
{
    /**
     * Obtiene todos los mensajes que recibió el usuario que se encuentra logueado
     *
     * @param  Usuario  $usuario
     * @return Collection
     */
    public function recibidos(Usuario $usuario)
    {
        return Mensaje::where('menDestino', $usuario->usuId)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
    
    /**
     * Obtiene todos los mensajes que envió el usuario que se encuentra logueado
     *
     * @param  Usuario  $usuario
     * @return Collection
     */
    public function enviados(Usuario $usuario)
    {
        return Mensaje::where('menEmisor', $usuario->usuId)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}