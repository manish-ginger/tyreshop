<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclesSuggest extends Model
{
    use HasFactory;
    protected $fillable = ['brand','shop_id'];
}
