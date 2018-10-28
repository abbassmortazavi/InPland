<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRelatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_relates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_fa', 191);
            $table->string('name_en', 191)->nullable();
            $table->text('content');
            $table->string('price');
            $table->integer('inventory');
            $table->text('address');
            $table->string('tel');
            $table->integer('state')->default(0);
            $table->string('category_name', 191)->nullable();
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('product_relates');
    }
}
