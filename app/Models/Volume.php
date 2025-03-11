<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Volume extends Model
{
    protected $table = 'product_volumes';
    protected $fillable = [
        'name',
        'slug'
    ];
    protected static function boot()
    {
        parent::boot();
        static ::creating(function ($model){
            $model->slug=Str::slug($model->name);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_volume_id', 'id');
    }

    public function volumes()
    {
        return $this->hasMany(Volume::class, 'parent_volume_id','id');
    }

}
