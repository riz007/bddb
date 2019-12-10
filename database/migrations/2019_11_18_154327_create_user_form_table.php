<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('spouse_name')->nullable();
            $table->string('position')->nullable();
            $table->string('organization')->nullable();
            $table->string('business_address')->nullable();
            $table->string('residence_address');
            $table->string('permanent_address');
            $table->string('phone');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('years');
            $table->string('facebook')->nullable();
            $table->string('viber')->nullable();
            $table->string('line')->nullable();
            $table->string('skype')->nullable();
            $table->string('feedback')->nullable();
            $table->string('image')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('user_form');
    }
}
