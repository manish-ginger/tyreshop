<?php

namespace App\Models;
use App\Models\Shopdetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','desc','password','approved'];

    public function detail(){
        return $this->hasOne(Shopdetail::class,'shop_id','id');
    }
}
