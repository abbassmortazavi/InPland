<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_pics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('pic_main')->default(0);
            $table->integer('product_related_id')->unsigned();
            $table->foreign('product_related_id')->references('id')->on('product_relates')->OnDelete('cascade');
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
        Schema::dropIfExists('product_pics');
    }
}
