<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla estadisticasHechizos en la base de datos.
*/
class CreateEstadisticasHechizosTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('estadisticasHechizos', function (Blueprint $table) {
            $table->integer('eshId')->unsigned();
            $table->integer('eshUsado');
            $table->primary('eshId');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('estadisticasHechizos');
    }
}
