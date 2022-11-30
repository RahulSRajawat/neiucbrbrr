<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LoginHistory extends Model
{
    use HasFactory;
    protected $table = 'users_login_history';
    protected $fillable = [
        "ip_address",
        "login_date",
        "login_time",
        "user_id"
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
