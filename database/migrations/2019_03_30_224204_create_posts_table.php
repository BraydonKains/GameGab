<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //Columns
            $table->bigIncrements('id');
            $table->string('content');
            $table->unsignedBigInteger('poster_id')->nullable();
            $table->unsignedBigInteger('thread_id');
            $table->timestamps();

            //Key constraints
            $table->foreign('poster_id')->
            references('id')->
            on('users')->
            onDelete('set null');

            $table->foreign('thread_id')->
            references('id')->
            on('threads')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
