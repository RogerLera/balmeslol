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
            $table->integer('camId')->unsigned();
            $table->integer('rolId')->unsigned();
            $table->integer('usuId')->unsigned();
            $table->string('guiHechizos');
            $table->string('guiRunas');
            $table->string('guiMaestrias');
            $table->string('guiHabilidades');
            $table->string('guiObjetos');
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
