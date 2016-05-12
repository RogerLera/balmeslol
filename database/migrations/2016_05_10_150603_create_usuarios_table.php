<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla usuarios en la base de datos.
*/
class CreateUsuariosTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuId');
            $table->string('usuAlias')->unique();
            $table->string('usuEmail')->unique();
            $table->date('usuFdn')->nullable();
            $table->binary('usuAvatar')->nullable();
            $table->string('usuPswd');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
