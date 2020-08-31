<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	public $fillable = [
        'product_id', 'display_iamge', 'image'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
