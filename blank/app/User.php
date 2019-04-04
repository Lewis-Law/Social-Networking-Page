<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    function post(){
        return $this->hasMany('App\Post', 'post_user_id');
    }
    function comment(){
        return $this->hasMany('App\Comment', 'user_id');
    }
    function friendship1(){
        return $this->hasMany('App\Friendship', 'auth_user_id');
    }

    function friendship2(){
        return $this->hasMany('App\Friendship', 'other_user_id');
    }

   /* function post() {
    return $this->belongsToMany('App\Post', 'Comments');
    } */
}
