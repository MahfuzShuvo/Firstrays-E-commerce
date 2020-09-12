<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public $fillable = [
        'product_id', 'attribute_id', 'value'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
    	return $this->belongsTo(Attribute::class);
    }
}
