<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankList extends Model
{
    protected $table = 'bank_list';
    protected $fillable = [
        "bank_id",
        "bank_name"
    ];
    use HasFactory;
}
