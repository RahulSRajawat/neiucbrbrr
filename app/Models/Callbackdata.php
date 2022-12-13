<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Callbackdata extends Model
{
    protected $table = 'callbackdata';
    protected $fillable = [
        "callback_status",
        "callback_data",
        "callback_event"
    ];
    use HasFactory;
}
