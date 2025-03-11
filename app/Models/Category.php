<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'parent_category_id',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();
        static ::creating(function ($model){
            $model->slug=Str::slug($model->name);
        });
    }


//    public function category()
//    {
//        return $this->belongsTo(Category::class, 'parent_category_id');
//    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
