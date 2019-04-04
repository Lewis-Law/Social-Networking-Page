<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'message'];
    
    
    function comment() {
        return $this->hasMany('App\Comment', 'post_id');
    }
    
    
    function user() {
        return $this->belongsTo('App\User' , 'id');
    }
    
    function user1() {
        return $this->hasOne('App\User','id', 'post_user_id');
    }
    /*
    function user() {
    return $this->belongsToMany('App\User', 'Comments');
    } */
}
