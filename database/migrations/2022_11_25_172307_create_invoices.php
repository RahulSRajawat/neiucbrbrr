<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("invoice_number");
            $table->string("payment_method");
            $table->string("invoice_status")->comment("Pending, Shipped, Completed");
            $table->string("grand_total");
            $table->string("currency");
            $table->bigInteger("track_number");
            $table->string("ship_firstname");
            $table->string("ship_lastname");
            $table->string("ship_email");
            $table->string("ship_phone");
            $table->string("ship_address");
            $table->string("ship_zip");
            $table->string("ship_country");
            $table->string("ship_state");
            $table->string("ship_city");
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
        Schema::dropIfExists('invoices');
    }
}
