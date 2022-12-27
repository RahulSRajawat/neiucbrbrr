<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmtBeneficiary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmt_beneficiary', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->bigInteger("bene_id");
            $table->string("mobile");
            $table->string("benename");
            $table->bigInteger("bankid");
            $table->bigInteger("accno");
            $table->bigInteger("pincode");
            $table->date("dob");
            $table->string("address");
            $table->string("ifsc")->nullable();
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
        Schema::dropIfExists('dmt_beneficiary');
    }
}
