<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasCampeonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticasCampeones', function (Blueprint $table) {
            $table->integer('escId')->unsigned();
            $table->integer('escUsado');
            $table->integer('escBloqueado');
            $table->primary('escId');
            $table->foreign('escId')->references('camId')->on('campeones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estadisticasCampeones');
    }
}
