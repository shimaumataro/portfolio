<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body','image'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
