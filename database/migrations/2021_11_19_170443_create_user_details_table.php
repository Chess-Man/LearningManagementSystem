<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name')->nullable()->default('Not Available');
            $table->string('middle_name')->nullable()->default('Not Available');
            $table->string('last_name')->nullable()->default('Not Available');
            $table->string('sex')->nullable()->default('Not Available');
            $table->string('religion')->nullable()->default('Not Available');
            $table->string('nationality')->nullable()->default('Not Available');
            $table->string('date_of_birth')->nullable()->default('Not Available');
            $table->string('place_of_birth')->nullable()->default('Not Available');
            $table->string('civil_status')->nullable()->default('Not Available');
            $table->string('phone_number')->nullable()->default('Not Available');
            $table->string('street')->nullable()->default('Not Available');
            $table->string('city')->nullable()->default('Not Available');
            $table->string('province')->nullable()->default('Not Available');
            $table->string('country')->nullable()->default('Not Available');
            $table->string('year_course')->nullable()->default('Not Available');
            $table->string('batch')->nullable()->default('Not Available');
            $table->string('contact_persion')->nullable()->default('Not Available');
            $table->string('relationship')->nullable()->default('Not Available');
            $table->string('contact_information')->nullable()->default('Not Available');
            $table->string('avatar')->nullable()->default('Not Available');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_details');
    }
}
