<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = ['id','user_id','invoice_number','payment_method','invoice_status','grand_total','currency','track_number','ship_firstname','ship_lastname','ship_email','ship_phone','ship_address','ship_zip','ship_country','ship_state','ship_city'];
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
