<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            //Columns
            $table->bigIncrements('id');
            $table->string('thread_title');
            $table->unsignedBigInteger('thread_creator_id')->nullable();
            $table->timestamps();

            //Key constraints
            $table->foreign('thread_creator_id')->
            references('id')->
            on('users')->
            onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
