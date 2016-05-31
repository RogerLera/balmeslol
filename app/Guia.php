<?php

namespace App;

use App\User;
use App\Role;
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
        'guiTitulo', 'camNombre', 'rolId', 'usuId', 'guiHechizos', 'guiRunas', 'guiMaestrias',
        'guiHabilidades', 'guiObjetos', 'guiPositivo', 'guiNegativo', 'guiVersion',
    ];

    /**
     * Obtenemos el usuario que a creado la guia.
     *
     * @return usuario al que pertenece.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votacions()
    {
        return $this->belongsToMany(User::class, 'votacions');
    }

    public function role()
   {
       return $this->hasOne(Role::class, 'rolId', 'rolId');
   }
}
