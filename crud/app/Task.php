<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users(){
    	return $this->belongsToMany('App\User')->withPivot('completed','assigned_at','completed_at');
    }

    public function taskitems(){
    	return $this->hasMany('App\TaskItem');
    }
}
