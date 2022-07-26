<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopdetail extends Model
{
    use HasFactory;
    protected $fillable = ['shop_id','licence','location','contact','owner','whatsapp','desc'];
}
