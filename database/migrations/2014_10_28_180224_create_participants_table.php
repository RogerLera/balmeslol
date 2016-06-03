<?php

use Cmgmyr\Messenger\Models\Models;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Models::table('participants'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id')->unsigned()->references('id')->on('threads')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('last_read');
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
        Schema::drop(Models::table('participants'));
    }
}
