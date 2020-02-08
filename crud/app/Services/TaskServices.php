<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;


 
class TaskServices{
	
	protected $task;
	function __construct(Task $task){
		$this->task = $task;
	}


	public function getAllTasks(){
		return $this->task->get();
	}

	public function storeTask($data){
		$this->task->title = $data['title'];
		$this->task->description = $data['description'];
		$this->task->due_at = $data['due_at'];
		return $this->task->save();
	}

	public function getTaskById($id){
		return $this->task->where('id','=',$id)->first();
	}

	public function updateTask($data,$id){
		$this->task = $this->task->where('id','=',$id)->first();
		$this->task->title = $data['title'];
		$this->task->description = $data['description'];
		return $this->task->save();
	}

	public function deleteById($id){
		$this->task = $this->task->where('id','=',$id)->first();
		return $this->task->delete();
	}
}