<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla guias en la base de datos.
*/
class CreateGuiasTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->increments('guiId');
            $table->string('guiTitulo');
            $table->string('camNombre', 20);
            $table->integer('rolId')->unsigned();
            $table->integer('usuId')->unsigned();
            $table->string('guiHechizos', 2000);
            $table->string('guiRunas', 2500);
            $table->string('guiHabilidades', 3000);
            $table->string('guiObjetos', 3000);
            $table->integer('guiPositivo');
            $table->integer('guiNegativo');
            $table->string('guiVersion');
            $table->timestamps();
            $table->foreign('rolId')->references('rolId')->on('roles');
            $table->foreign('usuId')->references('id')->on('users');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('guias');
    }
}
