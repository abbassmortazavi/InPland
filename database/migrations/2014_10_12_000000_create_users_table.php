<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 50);
            $table->string('family' , 50);
            $table->integer('type' , 50);
            $table->string('email')->unique();
            $table->string('tel');
            $table->integer('cityId');
            $table->integer('provinceId');
            $table->text('address');
            $table->boolean('sendMail')->default(0);
            $table->boolean('showInfo')->default(0);
            $table->boolean('offerReceipt')->default(1);
            $table->boolean('ReceiptPosts')->default(0);
            $table->text('workPlaceAddress');
            $table->string('workPlaceTel' , 20);
            $table->integer('workPlaceCity_id');
            $table->integer('workPlaceProvince_id');
            $table->string('medicalSystemNumber' , 50);
            $table->string('pic' , 100);
            $table->string('birthday' , 100);
            $table->boolean('sex')->default(0);
            $table->text('link');
            $table->integer('degreeOfEducation');
            $table->text('educationalInformation');
            $table->text('coursePassed');
            $table->text('researchRecords');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
