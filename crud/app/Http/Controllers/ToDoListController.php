<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todo;
use App\User;

class ToDoListController extends Controller
{
    public function index(){
    	
    	return view('user.todo.index');


    	
    	
    }

    

    public function ajaxStore(Request $request){
    	$list = new Todo();
    	$list->title = $request->title;
    	$list->user_id = $request->userid;
    	$list->save();

    	//$lists = Todo::all();
    	return response()->json(['list'=>$list]);

    	dd($request);
    }

    public function getAllLists(){
    	$user = Auth::user();
    	$lists = $user->todos;
    	//$lists = Todo::all();
    	// return view('user.todo.index',compact('lists'));
    	return response()->json(['lists'=>$lists]);
    }

    public function deleteList(Request $request){
    	$list = Todo::find($request->listid);
    	$list->delete();
    	return response()->json(['success'=>'Deleted']);
    }

    public function updateList(Request $request){
    	$list=Todo::find($request->listid);
    	if($list->completed==true){
    		$list->completed = false;
    	}
    	else{
    		$list->completed = true;
    	}
    	$list->save();
    	return response()->json(['success'=>'Completed']);
    }
}
