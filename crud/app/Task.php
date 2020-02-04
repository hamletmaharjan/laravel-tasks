<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users(){
    	return $this->belongsToMany(User::class,'task_user')->withPivot('completed');
    }
}
