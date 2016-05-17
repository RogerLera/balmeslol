<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla mensajes en la base de datos.
*/
class CreateMensajesTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('menId');
            $table->integer('menEmisor')->unsigned();
            $table->integer('menDestino')->unsigned();
            $table->string('menTexto');
            $table->timestamps();
            $table->foreign('menEmisor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('menDestino')->references('id')->on('users');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('mensajes');
    }
}
