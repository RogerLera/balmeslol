<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeones', function (Blueprint $table) {
            $table->integer('camId')->unsigned();
            $table->string('camNobre');
            $table->string('camTitulo');
            $table->binary('camMiniatura');
            $table->binary('camImagen');
            $table->string('camEtiqueta');
            $table->string('camDescripcion');
            $table->integer('camDificultad');
            $table->string('camConsejos');
            $table->string('camConsejosAdv');
            $table->primary('camId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campeones');
    }
}
