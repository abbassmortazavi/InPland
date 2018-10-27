<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id')->nullable();
            $table->string('content');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->OnDelete('cascade');

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
        Schema::dropIfExists('comment_posts');
    }
}
