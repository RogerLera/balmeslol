<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasHechizosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticasHechizos', function (Blueprint $table) {
            $table->integer('eshId');
            $table->primary('eshId');
            $table->integer('eshUsado');
            $table->foreign('eshId')->references('hecId')->on('hechizos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estadisticasHechizos');
    }
}
