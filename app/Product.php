<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }

    public function innerSubCategories()
    {
        return $this->belongsToMany(InnerSubCategory::class);
    }*/

    /*public function product()
    {
        return $this->morphTo();
    }*/

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function categories()
    {
        return $this->belongsToMany(InnerSubCategory::class, 'category_products','product_id','category_id');
    }
}
