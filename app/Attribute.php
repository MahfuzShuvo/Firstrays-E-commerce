<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function productAttribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
