<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','cust_type','shop_id','mobile','whatsapp','qid','brand','model','variant','vehicle_category','wash_frequency','dob'];

}
