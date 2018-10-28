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
            $table->string('name', 191);
            $table->text('content');
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
        Schema::dropIfExists('product_relates');
    }
}
