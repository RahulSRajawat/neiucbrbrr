<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_id')->unique();
            $table->string("loan_type"); 
            $table->string("applied_loan_amount"); 
            $table->string("agent_id"); 
            $table->string("monthly_salary"); 
            $table->string("salary_option"); 
            $table->string("customer_occupation"); 
            $table->string("customer_full_name"); 
            $table->string("customer_contact_number"); 
            $table->string("customer_email"); 
            $table->string("customer_address"); 
            $table->string("customer_pincode"); 
            $table->string("customer_state"); 
            $table->string("customer_district"); 
            $table->string("customer_marital_status"); 
            $table->string("customer_dob"); 
            $table->string("customer_gender"); 
            $table->string("customer_children"); 
            $table->string("customer_ownership"); 
            $table->string("customer_duration"); 
            $table->string("customer_gold_karat"); 
            $table->string("customer_gold_weight"); 
            $table->string("work_name"); 
            $table->string("work_address"); 
            $table->string("work_pincode"); 
            $table->string("work_state"); 
            $table->string("work_district"); 
            $table->string("work_email"); 
            $table->string("work_current_experience"); 
            $table->string("work_total_experience");   
            $table->string("document_aadhaar_card");  
            $table->string("document_pan_card");  
            $table->string("document_passport_photo");  
            $table->string("document_salary_slip_first");  
            $table->string("document_salary_slip_second");  
            $table->string("document_salary_slip_thired");  
            $table->string("document_bank_statement");  
            $table->string("document_registery_papers");  
            $table->string("document_rent_agreement");  
            $table->string("document_itr");  
            $table->string("document_registration_proof");  
            $table->bigInteger("status")->comment("0 pending, 1 Success, 2 Unapproved, 3 Approved, 4 Complete"); 
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
        Schema::dropIfExists('loans');
    }
}
