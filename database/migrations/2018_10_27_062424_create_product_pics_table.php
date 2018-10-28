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
            $table->integer('productRelated_id');
            $table->string('name');
            $table->integer('picMain')->default(0);

            //$table->foreign('productRelated_id')->references('id')->on('product_relates')->OnDelete('cascade');

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
