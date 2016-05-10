<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->integer('menId');
            $table->primary('menId');
            $table->integer('menEmisor');
            $table->foreign('menEmisor')->references('usuId')->on('usuario');
            $table->string('menTexto');
            $table->integer('menDestino');
            $table->foreign('menDestino')->references('usuId')->on('usuario');
            $table->date('menFecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensajes');
    }
}
