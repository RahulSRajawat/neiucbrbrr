<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargpePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargpe_plan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("operator_id");
            $table->string("circle")->nullable();
            $table->bigInteger("plan_category_id");
            $table->string("data")->nullable();
            $table->string("validity")->nullable();
            $table->string("price");
            $table->string("description");
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
        Schema::dropIfExists('rechargpe_plan');
    }
}
