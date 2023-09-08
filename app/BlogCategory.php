<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function blogPost(){
        return $this->hasMany('App\BlogPost','blog_category_id');
    }
}
