<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	public $timestamps = false;


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function taskgroup(){
    	return $this->belongsTo(TaskGroup::class);
    }
}
