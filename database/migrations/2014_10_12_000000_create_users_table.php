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
            $table->string('password');
            $table->integer('type');
            $table->string('email')->unique();
            $table->string('tel')->nullable();
            $table->string('mobile');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->text('address')->nullable();
            $table->boolean('send_mail')->default(0);
            $table->boolean('show_info')->default(0);
            $table->boolean('offer_receipt')->default(1);
            $table->boolean('receipt_posts')->default(0);
            $table->text('work_place_address')->nullable();
            $table->string('work_place_tel' , 20)->nullable();
            $table->integer('work_place_city_id')->nullable();
            $table->integer('work_place_province_id')->nullable();
            $table->string('medical_system_number' , 50)->nullable();
            $table->string('pic' , 150)->nullable();
            $table->string('birthday' , 20)->nullable();
            $table->boolean('sex')->default(0);
            $table->text('link')->nullable();
            $table->integer('degree_of_education')->nullable();
            $table->text('educational_information')->nullable();
            $table->text('course_passed')->nullable();
            $table->text('research_records')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
