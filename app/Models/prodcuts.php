<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class prodcuts extends Model
{
    protected $table = 'produts';
    protected $fillable = ['id','title','price','stock','short_description','description','status','link','image'];
    use HasFactory;
}
