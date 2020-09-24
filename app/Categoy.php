<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoy extends Model
{
    protected $table = "categories";
    protected $fillable = ['name'];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Post','category_id' ,'id');
    }
}
