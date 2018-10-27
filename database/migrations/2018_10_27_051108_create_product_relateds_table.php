<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRelatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_relateds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->text('content');
            $table->string('content');
            $table->string('price');
            $table->integer('inventory');
            $table->text('address');
            $table->string('tel');
            $table->integer('state');
            $table->integer('cat_id');
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
        Schema::dropIfExists('product_relateds');
    }
}
