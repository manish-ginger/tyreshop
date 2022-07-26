<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['brand','model','variant','image','desc','vehicle_category_id','vehicle_model_id','approved','shop_id'];

}
