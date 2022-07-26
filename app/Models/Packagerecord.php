<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packagerecord extends Model
{
    use HasFactory;
    protected $fillable = ['shop_id','customer_id','package_id'];
}
