<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
//    protected $fillable = ['feature_name','vehicle_category','model','actual_price','discounted_price','perc_or_amount','gift_card','coupon','accessory','free_services','duration','shop_id'];
    protected $guarded = [];
}
