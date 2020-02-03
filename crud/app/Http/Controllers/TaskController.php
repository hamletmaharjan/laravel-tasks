<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskServices;
use App\Task;


class TaskController extends Controller
{
	protected $taskService;

	function __construct(TaskServices $taskService){
		$this->taskService = $taskService;
	}

    public function index(){
    	$tasks = $this->taskService->getAllTasks();
    	return view('admin.tasks.index', compact('tasks'));
    }

    public function create(){
    	return view('admin.tasks.create');
    }

    public function show($id){
    	//
    }

    public function edit($id){
    	$task = $this->taskService->getTaskById($id);
    	return view('admin.tasks.edit', compact('task'));
    }

    public function store(Request $request){
    	$this->taskService->storeTask($request->all());
    	return 'check db';
    }

    public function update(Request $request, $id){
    	if($this->taskService->updateTask($request->all(),$id)){
    		return redirect()->route('task.index');
    	}
    	else{
    		return 'somethings wrong';
    	}
    }

    public function destroy(){

    }

    public function showAssignView(){
    	return view('admin.tasks.assign');
    }
}
