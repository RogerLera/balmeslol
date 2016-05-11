<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeon extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var array
     */
    protected $fillable = [
        'camId', 'camNombre', 'camTitulo', 'camMiniatura', 'camImagen',
        'camEtiqueta', 'camDificultad', 'camDescripcion', 'camConsejos', 'camConsejosAdv',
    ];
}
