<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBankDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_bank_details', function (Blueprint $table) {
            $table->id();
            $table->string("pan_no")->nullable();
            $table->string("aadhar_no")->nullable();
            $table->string("aadhar_front")->nullable();
            $table->string("aadhar_back")->nullable();
            $table->string("photo")->nullable();
            $table->string("pan_image")->nullable();
            $table->string("bank_image")->nullable();
            $table->string("user")->nullable();
            $table->datetime("verify_by")->nullable();
            $table->datetime("created_by")->nullable();
            $table->unsignedBigInteger("user_id");
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
        Schema::dropIfExists('users_bank_details');
    }
}
