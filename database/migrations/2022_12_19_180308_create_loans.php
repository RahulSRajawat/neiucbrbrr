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
            $table->string("loan_type")->nullable(); 
            $table->string("applied_loan_amount")->nullable(); 
            $table->string("agent_id")->nullable(); 
            $table->string("monthly_salary")->nullable(); 
            $table->string("salary_option")->nullable(); 
            $table->string("customer_occupation")->nullable(); 
            $table->string("customer_full_name")->nullable(); 
            $table->string("customer_contact_number")->nullable(); 
            $table->string("customer_email")->nullable(); 
            $table->string("customer_address")->nullable(); 
            $table->string("customer_pincode")->nullable(); 
            $table->string("customer_state")->nullable(); 
            $table->string("customer_district")->nullable(); 
            $table->string("customer_marital_status")->nullable(); 
            $table->string("customer_dob")->nullable(); 
            $table->string("customer_gender")->nullable(); 
            $table->string("customer_children")->nullable(); 
            $table->string("customer_ownership")->nullable(); 
            $table->string("customer_duration")->nullable(); 
            $table->string("customer_gold_karat")->nullable(); 
            $table->string("customer_gold_weight")->nullable(); 
            $table->string("work_name")->nullable(); 
            $table->string("work_address")->nullable(); 
            $table->string("work_ownership")->nullable(); 
            $table->string("work_pincode")->nullable(); 
            $table->string("work_state")->nullable(); 
            $table->string("work_district")->nullable(); 
            $table->string("work_email")->nullable(); 
            $table->string("work_current_experience")->nullable(); 
            $table->string("work_total_experience")->nullable();   
            $table->string("document_aadhaar_card")->nullable();  
            $table->string("document_pan_card")->nullable();  
            $table->string("document_passport_photo")->nullable();  
            $table->string("document_salary_slip_first")->nullable();  
            $table->string("document_salary_slip_second")->nullable();  
            $table->string("document_salary_slip_thired")->nullable();  
            $table->string("document_bank_statement")->nullable();  
            $table->string("document_registery_papers")->nullable();  
            $table->string("document_rent_agreement")->nullable();  
            $table->string("document_itr")->nullable();  
            $table->string("document_registration_proof")->nullable();  
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
