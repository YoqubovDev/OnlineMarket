<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    protected static function boot()
    {
        parent::boot();
        static ::creating(function ($model){
            $model->slug=Str::slug($model->name);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id','id');
    }
}
