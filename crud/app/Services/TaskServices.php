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
		$this->task->user_id = $data['user_id'];
		$this->task->task_group_id = $data['task_group_id'];
		$this->task->assigned_at = Carbon::now();
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