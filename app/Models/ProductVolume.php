<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVolume extends Model
{
    protected $fillable=[
        'product_id',
        'volume_id'
    ];
}
