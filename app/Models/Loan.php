<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Loan extends Model
{
    protected $table = 'loans';
    protected $fillable = [
        "loan_id",
        "loan_type",
        "applied_loan_amount",
        "agent_id",
        "monthly_salary",
        "salary_option",
        "customer_occupation",
        "customer_full_name",
        "customer_contact_number",
        "customer_email",
        "customer_address",
        "customer_pincode",
        "customer_state",
        "customer_district",
        "customer_marital_status",
        "customer_dob",
        "customer_gender",
        "customer_children",
        "customer_ownership",
        "customer_duration",
        "customer_gold_karat",
        "customer_gold_weight",
        "work_name",
        "work_address",
        "work_ownership",
        "work_pincode",
        "work_state",
        "work_district",
        "work_email",
        "work_current_experience",
        "work_total_experience",
        "document_aadhaar_card",
        "document_pan_card",
        "document_passport_photo",
        "document_salary_slip_first",
        "document_salary_slip_second",
        "document_salary_slip_thired",
        "document_bank_statement",
        "document_registery_papers",
        "document_rent_agreement",
        "document_itr",
        "document_registration_proof",
        "status"
    ];
    use HasFactory;
}
