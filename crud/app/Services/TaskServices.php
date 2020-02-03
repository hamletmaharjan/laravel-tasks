<?php

namespace App\Services;

use App\Task;


 
class TaskServices{
	
	protected $task;
	function __construct(Task $task){
		$this->task = $task;
	}


	public function getAllTasks(){
		return $this->task->get();
	}
}