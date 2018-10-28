<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userIdQuestion');
            $table->string('userIdReply');
            $table->string('company_id');
            $table->integer('type');
            $table->boolean('unKnown')->default(0);

            $table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');


            //$table->foreign('company_id')->references('id')->on('companies')->OnDelete('cascade');
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
        Schema::dropIfExists('answer_questions');
    }
}
