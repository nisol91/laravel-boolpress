<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'author', 'content', 'category_id'];

    public function category() {

        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
