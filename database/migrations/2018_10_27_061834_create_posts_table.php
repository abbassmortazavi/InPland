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
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('date' , 100);
            $table->string('video' , 500);
            $table->text('link' , 500);
            $table->boolean('state')->default(0);
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('cat_id');
            $table->integer('type');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');

            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')->OnDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
