<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function taskgroup(){
    	return $this->belongsTo('App\TaskGroup');
    }
}
