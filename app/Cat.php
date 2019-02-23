<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = ['name', 'id'];

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
