<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function innerSubCategory()
    {
        return $this->hasMany(InnerSubCategory::class);
    }

    public function products()
    {
        return $this->morphMany('App\Product', 'product');
    }
}
