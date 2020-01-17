<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$users = User::get();
    	return view('user.index',compact('users'));
    }

    public function create(){
    	return view('user.create');
    }

    public function show($id){
    	$user = User::findOrFail($id);
    	return view('user.show',compact('user'));
    }

    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('user.edit',compact('user'));
    }

    public function store(Request $request){
    	//$users = User::firstOrCreate($request->all());

    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->save();

    	

    	return redirect()->route('users.index');
    }

    public function update(Request $request,$id){
    	$user = User::findOrFail($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->save();
    	return redirect()->route('users.index');
    }

    public function destroy($id){
    	
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->route('users.index');

    }
}
