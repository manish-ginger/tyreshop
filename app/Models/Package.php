<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model
{
    use HasFactory;
    protected $hidden = ['id'];
    protected $guarded = [];

    public function gallery()
    {
        return $this->hasOne(Packageimg::class, 'pack_id', 'id');
    }

}
