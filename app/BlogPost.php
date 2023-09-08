<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function admin()
    {
        return $this->belongsTo('App\Admin','author_id');
    }
}
