<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function userto(){
    	return $this->belongsTo('App\User', 'to','id');
    }

    public function userfrom(){
    	return $this->belongsTo('App\User', 'from', 'id');
    }
}
