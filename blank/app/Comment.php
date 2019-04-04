<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['message'];
    
    
    
    
    
    function post() {
        return $this->belongsTo('App\Post', 'id');
    }
    
    function user() {
        return $this->belongsTo('App\User', 'id');
    }
    
    function user1() {
        return $this->hasOne('App\User','id', 'user_id');
    }
    /*
    function user() {
        return $this->belongsTo('App\User');
    }*/ 
}
