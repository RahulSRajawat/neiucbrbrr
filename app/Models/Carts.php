<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\prodcuts;
class Carts extends Model
{
    protected $table = 'cart';
    protected $fillable = ['id','product_id','user_id','product_quantity','status','invoice_id'];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(prodcuts::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
