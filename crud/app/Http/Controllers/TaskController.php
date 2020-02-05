<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TaskServices;
use App\Task;
use App\User;
use App\Role;


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

    public function destroy($id){
        if($this->taskService->deleteById($id)){
            return redirect()->route('task.index');
        }
        else{
            return 'could not delete';
        }

    }

    public function showAssignView(){
        $users = User::whereHas(
            'role', function($q){
                $q->where('name', 'user');
            }
        )->get();
        $tasks = Task::all();
    	return view('admin.tasks.assign',compact('users','tasks'));
    }

    public function assignTask(Request $request){
        
        $user = User::find($request->user_id);
        $user->tasks()->attach($request->task_id);
        return 'done i guess';
        
        
    }





    //FrontEnd for ajax


    public function showTasks(){
        return view('user.tasks.index');
    }

    public function getTasks(){
        $user = Auth::user();
        $tasks = $user->tasks;
        return response()->json(['tasks'=>$tasks]);
    }

    public function updateTask(Request $request){

        $user = Auth::user();
        $t = $user->tasks->where('id','=',$request->taskid)->first();
        if($t->pivot->completed){
            $user->tasks()->updateExistingPivot($request->taskid,['completed'=>false]);
        }
        else{
            $user->tasks()->updateExistingPivot($request->taskid,['completed'=>true]);
        }
        return response()->json(['status'=>'success']);
    }
}
