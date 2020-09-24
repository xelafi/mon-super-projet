<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['name', 'slug', 'description', 'content', 'category_id','image', 'user_id'];

    public function category()
    {
        return $this->hasOne('App\Categoy',  'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
