<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    function user1() {
        return $this->belongsTo('App\User');
    }

    function user2() {
        return $this->belongsTo('App\User');
    }
    function other(){
        return $this->hasOne('App\User','id', 'other_user_id');
    }
}
