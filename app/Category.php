<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->morphMany('App\Product', 'product');
    }

}
