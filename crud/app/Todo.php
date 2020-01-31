<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';


    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
}
