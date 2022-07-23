<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packageimg extends Model
{
    use HasFactory;
    protected $hidden = ['id'];
    protected $guarded = [];

    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'pack_id');
    }
}
