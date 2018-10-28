<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id_jarah')->unsigned();
            $table->foreign('user_id_jarah')->references('id')->on('users')->onDelete('cascade');
            $table->integer('product_related_id')->unsigned();
            $table->foreign('product_related_id')->references('id')->on('product_relates')->onDelete('cascade');
            $table->string('content');
            $table->boolean('state')->default(0);
            $table->integer('type');
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
        Schema::dropIfExists('surveys');
    }
}
