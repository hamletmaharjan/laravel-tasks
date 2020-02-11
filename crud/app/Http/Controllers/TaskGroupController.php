<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskGroup;

class TaskGroupController extends Controller
{
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
}
