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
            $table->integer('camId');
            $table->primary('habId');
            $table->foreign('camId');
            ->references('camid')->on('campeones');
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
