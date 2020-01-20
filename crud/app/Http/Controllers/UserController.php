<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User'],
            'password' => ['required', 'string', 'min:8']
        ]);
        // $validatedData = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        

    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->password);
        $user->roles = $request->roles;
    	$user->save();

    	

    	return redirect()->route('users.index');
    }

    public function update(Request $request,$id){
    	$user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User'],
            'password' => ['required', 'string', 'min:8']
        ]);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
        $user->roles = $request->roles;
    	$user->save();
    	return redirect()->route('users.index');
    }

    public function destroy($id){
    	
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->route('users.index');

    }


    // protected function create(array $data){
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
