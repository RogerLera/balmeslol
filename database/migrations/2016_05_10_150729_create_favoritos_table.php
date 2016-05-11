<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->increments('favId');
            $table->integer('usuId')->unsigned();
            $table->integer('guiId')->unsigned();
            $table->foreign('usuId')->references('usuId')->on('usuarios')->onDelete('cascade');
            $table->foreign('guiId')->references('guiId')->on('guias')->onDelete('cascade');
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
        Schema::drop('favoritos');
    }
}
