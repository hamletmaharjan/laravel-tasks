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
    	return view('admin.tasks.index');
    }

    public function show($id){
    	//
    }

    public function edit(){
    	//
    }

    public function store(){

    }

    public function update(){
    	//
    }

    public function destroy(){

    }
}
