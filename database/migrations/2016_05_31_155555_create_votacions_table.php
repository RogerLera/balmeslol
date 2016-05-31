<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuId')->unsigned();
            $table->integer('guiId')->unsigned();
            $table->boolean('votValoracion');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('usuId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guiId')->references('id')->on('guias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
