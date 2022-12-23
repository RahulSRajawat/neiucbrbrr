<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargePlan extends Model
{
    protected $table = 'rechargpe_plan';
    protected $fillable = ['id','operator_id','circle','plan_category_id','data','validity','price','description'];
    use HasFactory;
    public function plancateogry()
    {
        return $this->belongsTo(RechargePlanCategory::class,'plan_category_id');
    }
}
