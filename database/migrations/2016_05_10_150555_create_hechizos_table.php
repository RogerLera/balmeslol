<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHechizosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hechizos', function (Blueprint $table) {
            $table->integer('hecId');
            $table->primary('hecId');
            $table->string('hecNombre');
            $table->string('hecDescripcion');
            $table->binary('hecImagen');
            $table->integer('hecReutilizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hechizos');
    }
}
