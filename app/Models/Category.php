<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{

    protected $table = 'categories';


    protected $fillable = [
        'name',
        'category_id',
    ];



    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }

}
