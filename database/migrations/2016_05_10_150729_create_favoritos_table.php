<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla favoritos en la base de datos.
*/
class CreateFavoritosTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->increments('favId');
            $table->integer('usuId')->unsigned();
            $table->integer('guiId')->unsigned();
            $table->timestamps();
            $table->foreign('usuId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guiId')->references('guiId')->on('guias')->onDelete('cascade');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('favoritos');
    }
}
