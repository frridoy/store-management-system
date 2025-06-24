<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'stock_quantity',
        'sold_quantity',
        'available_quantity',
        'sku',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
