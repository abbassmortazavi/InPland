<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('userIdJarah')->nullable();
            $table->string('post_id')->nullable();
            $table->string('question_id')->nullable();
            $table->string('reply_id')->nullable();
            $table->integer('type');
            $table->string('ip')->nullable();

            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');


            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            //$table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
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
        Schema::dropIfExists('scores');
    }
}
