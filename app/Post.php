<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
   // protected  $guarded = [];

    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }
   // public function post()
   // {
     //   return $this->belongsTo('App\Post');
    //}
}
