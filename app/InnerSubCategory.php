<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerSubCategory extends Model
{
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

   /* public function products()
    {
        return $this->morphMany('App\Product', 'product');
    }*/

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products','category_id','product_id');
    }
}
