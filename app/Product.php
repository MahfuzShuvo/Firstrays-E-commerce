<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable = [
        'name', 'sku', 'brand_id', 'category_id', 'price', 'quantity', 'slug', 'status'
    ];


    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class)->withDefault();
    }

    public function brand()
    {
    	return $this->belongsTo(Brand::class)->withDefault();
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
        // return $this->hasMany(Attribute::class);
    }
}
