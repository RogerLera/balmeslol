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
            $table->integer('usuId');
            $table->integer('guiId');
            
            $table->foreign('usuId')
            ->references('usuId')->on('usuarios')
            
            $table->foreign('guiId')
            ->references('guiId')->on('guias')
            
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
