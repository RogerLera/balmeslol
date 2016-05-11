<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla estadisticasCampeones en la base de datos.
*/
class CreateEstadisticasCampeonesTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('estadisticasCampeones', function (Blueprint $table) {
            $table->integer('escId')->unsigned();
            $table->integer('escUsado');
            $table->integer('escBloqueado');
            $table->primary('escId');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('estadisticasCampeones');
    }
}
