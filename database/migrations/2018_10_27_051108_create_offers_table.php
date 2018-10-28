<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('product_related_id')->unsigned();
            $table->foreign('product_related_id')->references('id')->on('product_relates')->onDelete('cascade');
            $table->integer('user_id_offer')->unsigned();
            $table->foreign('user_id_offer')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id_send')->unsigned();
            $table->foreign('user_id_send')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id_offer_receipt')->unsigned();
            $table->foreign('user_id_offer_receipt')->references('id')->on('users')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->integer('type');
            $table->integer('brand_id_send')->unsigned();
            $table->foreign('brand_id_send')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
