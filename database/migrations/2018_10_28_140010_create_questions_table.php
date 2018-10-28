<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('user_id_question')->unsigned();
            $table->foreign('user_id_question')->references('id')->on('users')->OnDelete('cascade');
            $table->integer('user_id_reply')->unsigned();
            $table->foreign('user_id_reply')->references('id')->on('users')->OnDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->OnDelete('cascade');
            $table->integer('type');
            $table->boolean('unknown')->default(0);
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
        Schema::dropIfExists('questions');
    }
}
