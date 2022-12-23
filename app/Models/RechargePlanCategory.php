<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargePlanCategory extends Model
{
    protected $table = 'recharge_plan_categories';
    protected $fillable = ['id','plan_category_name'];
    use HasFactory;
}
