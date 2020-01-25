<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\User;

class UserController extends Controller
{
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }

    public function index(){
    	//$users = User::get();
        $users = $this->userServices->getAllUsers();
    	return view('admin.users.index',compact('users'));
    }

    public function create(){
    	return view('admin.users.create');
    }

    public function show($id){
    	//$user = User::findOrFail($id);
        $user = $this->userServices->getUserById($id);
    	return view('admin.users.show',compact('user'));
    }

    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('admin.users.edit',compact('user'));
    }

    public function store(Request $request){
    	//$users = User::firstOrCreate($request->all());

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User'],
            'password' => ['required', 'string', 'min:8'],
            'contact' => ['required','max:15']
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
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->date_of_birth = $request->date_of_birth;
        $user->temp_address = $request->temp_address;
        $user->perm_address = $request->perm_address;
    	$user->save();

    	

    	return redirect()->route('users.index');
    }

    public function update(Request $request,$id){
        
    	$user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	//$user->password = $request->password;
        $user->roles = $request->roles;
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->date_of_birth = $request->date_of_birth;
        $user->temp_address = $request->temp_address;
        $user->perm_address = $request->perm_address;
    	$user->save();

        
    	return redirect()->route('admin.users.index');
    }

    public function destroy($id){
    	
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->route('admin.users.index');

    }

    public function showUserSettings(){
        return view('user.settings');
    }

    public function showAdminSettings(){
        return view('admin.settings');
    }

    public function showChangePasswordForm(){
        return view('user.auth.changepassword');
    }

    public function changePassword(Request $request){
        if (Hash::check($request->old_password, Auth::user()->password)) {
            
            $request->validate([
                'password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['same:password']
            ]);

            if(Hash::check($request->password,Auth::user()->password)){
                return redirect()->route('users.password')->with('error','new password cannot be same as old one');
            }
        
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('users.settings')->with('message','password changed');
        }
        else{
            return redirect()->route('users.password')->with('error','invalid password');
        }
        
    }




    // protected function create(array $data){
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
