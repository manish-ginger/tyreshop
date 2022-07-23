<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VehicleModel extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc','image','vehicle_brand_id','vehicle_category_id'];
}
