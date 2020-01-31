<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

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
    	$lists = Todo::all();
    	// return view('user.todo.index',compact('lists'));
    	return response()->json(['lists'=>$lists]);
    }
}
