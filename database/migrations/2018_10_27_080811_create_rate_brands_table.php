<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('user_id');
            $table->string('productionId');
            $table->integer('countImplant');
            $table->integer('offer');



            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


           // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('rate_brands');
    }
}
