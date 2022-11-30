<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProduts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('price');
            $table->bigInteger('stock');
            $table->text('short_description')->comment("max 200 Words")->nullable();
            $table->longText('description')->nullable();
            $table->string('image');
            $table->bigInteger('status')->comment('0 Inactive, 1 Active')->nullable();
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
        Schema::dropIfExists('produts');
    }
}
