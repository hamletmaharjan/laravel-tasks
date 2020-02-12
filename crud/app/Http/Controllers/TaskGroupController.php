<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TaskGroup;
use Illuminate\Notifications\Notifiable;
use App\Notifications\HamsNotification;
use Carbon\Carbon;

class TaskGroupController extends Controller
{
	use Notifiable;
    //

    public function index(){
    	return 'index';
    }


    public function create(){
    	return view('admin.tasks.createtaskgroup');
    }



    public function store(Request $request){
    	$taskGroup = new TaskGroup();
    	$taskGroup->title = $request->title;
    	$taskGroup->description = $request->description;
    	$taskGroup->due_at = $request->due_at;
    	$taskGroup->save();

    	return redirect()->route('admin.dashboard');
    }











    //for ajax
    public function getAll(){
    	$user = Auth::user();
    	
    	$taskgroups = TaskGroup::whereHas('tasks',function($q){$q->where('user_id',Auth::user()->id);})->get();
    	// foreach($taskgroups as $taskgroup){
    	// 	if(Carbon::parse($taskgroup->due_at)->isTomoroow()){
    	// 		return 'notification';
    	// 		$user->notify(new HamsNotification($taskgroup));
    	// 	}
    	// }
        //return $taskgroups;

        return response()->json(['taskgroups'=>$taskgroups]);

    }
}
