<?php

namespace App;

use App\User;
use App\Role;
use App\Favorito;
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
        return $this->belongsTo(User::class, 'usuId');
    }

    /**
     * Obtenemos las votaciones que tiene la guia.
     *
     * @return votaciones que tiene.
     */
    public function votacions()
    {
        return $this->belongsToMany(User::class, 'votacions');
    }

    /**
     * Obtenemos el rol al que hace referencia la guia.
     *
     * @return rol que referencia.
     */
    public function role()
   {
       return $this->hasOne(Role::class, 'rolId', 'rolId');
   }

   /**
     * Obtenemos si la guia es favorita.
     *
     * @return favorito o no.
     */
   public function favorito()
  {
      return $this->hasOne(Favorito::class, 'guiId');
  }
}
