<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workingdays extends Model
{
    use HasFactory;
    protected $fillable = ['shop_id','days','from','to','status'];
}
