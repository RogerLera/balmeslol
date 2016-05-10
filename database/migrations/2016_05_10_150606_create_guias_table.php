<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->integer('guiId');
            $table->primary('guiId');
            $table->string('guiDescripcion');
            $table->integer('usuId');
            $table->foreign('usuId')->references('usuId')->on('usuarios');
            $table->integer('guiPositivo');
            $table->integer('guiNegativo');
            $table->date('guiFecha');
            $table->string('guiVersion');
            $table->timestamps();
            
            $table->foreign('guiId')
            ->references('guiId')->on('favoritos')
            >onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guias');
    }
}
