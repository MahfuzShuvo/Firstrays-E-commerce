<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $fillable = [
        'name', 'description'
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
