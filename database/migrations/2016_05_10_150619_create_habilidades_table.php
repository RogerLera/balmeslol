<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidades', function (Blueprint $table) {
            $table->increments('habId');
            $table->string('habNombre');
            $table->string('habTipo');
            $table->binary('habImagen');
            $table->string('habDescripcion');
            $table->integer('camId')->unsigned();
            $table->foreign('camId')->references('camId')->on('campeones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('habilidades');
    }
}
