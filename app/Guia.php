<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

/**
* Classe Guia alamzena un manual creado por un usuario sobre como jugar
* con X campeón.
*/
class Guia extends Model
{
    /**
     * Atributos de la classe que son assignables.
     *
     * @var $fillable: array con los valores que se pueden modificar.
     */
    protected $fillable = [
        'guiTitulo', 'guiDescripcion', 'camId', 'usuId', 'guiPositivo', 'guiNegativo', 'guiVersion',
    ];

    /**
     * Obtenemos el usuario que a creado la guia.
     *
     * @return usuario al que pertenece.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
