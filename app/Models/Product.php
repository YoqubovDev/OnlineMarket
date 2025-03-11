<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable =
        [
            'product_id',
            'name',
            'description',
            'price',
            'sale_price',
            'category_id',
            'product_volume',
            'stock_quantity',
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');

    }

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id', 'id');
    }
}
