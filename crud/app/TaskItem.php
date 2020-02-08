<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{

	protected $table = 'task_lists';
    public function task(){
    	return $this->belongsTo('App\Task');
    }
}
