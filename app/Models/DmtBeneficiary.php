<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmtBeneficiary extends Model
{
    protected $table = 'dmt_beneficiary';
    protected $fillable = [
        "user_id", 
        "bene_id", 
        "mobile", 
        "benename", 
        "bankid", 
        "accno", 
        "pincode",
        "dob",
        "address",
        "ifsc"
    ];
    use HasFactory;
}
