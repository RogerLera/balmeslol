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
            $table->integer('habId');
            $table->binary('habImagen');
            $table->string('habDescripcion');
            $table->integer('camId')->unsigned();
            $table->foreign('camId')->references('camId')->on('campeones')->onDelete('cascade');
            $table->primary('habId');
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
