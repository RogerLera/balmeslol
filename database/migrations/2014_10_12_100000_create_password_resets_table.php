<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* Classe que genera la tabla password_resets en la base de datos.
*/
class CreatePasswordResetsTable extends Migration
{
    /**
     * Ejecuta la migración a la base de datos.
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    /**
     * Hace una marcha atras de la migración, i vuelve al estado original.
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
