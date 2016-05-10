<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuId');
            $table->string('usuAlias');
            $table->string('usuEmail')->unique();
            $table->date('usuFdn');
            $table->increments('usuPswd');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('usuId')->references('menEmisor')
                ->on('mensajes')
                ->onDelete('cascade');
            $table->foreign('usuId')->references('menDestino')
                ->('mensajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
