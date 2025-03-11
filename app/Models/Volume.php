<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Volume extends Model
{
    protected $table = 'product_volumes';
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_volume_id', 'id');
    }

    public function volumes()
    {
        return $this->hasMany(Volume::class, 'parent_volume_id','id');
    }

}
