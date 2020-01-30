<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function index(){
    	return view('user.todo.index');
    }

    

    public function ajaxStore(Request $request){
    	return response()->json('success');
    	dd($request);
    }
}
