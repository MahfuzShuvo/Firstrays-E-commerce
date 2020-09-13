<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable = [
        'name',
        'sku',
        'brand_id',
        'category_id',
        'price',
        'purchase',
        'promotion_price',
        'starting_date',
        'end_date',
        'quantity',
        'alert_quantity',
        'slug',
        'status',
        'isFeaturd'
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
    }
}
