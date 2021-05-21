<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\User;
use App\Role;
use App\Permission;
class UserController extends Controller
{
    protected $userServices;
    public function __construct(UserServices $userServices){
        $this->userServices = $userServices;
    }

    public function index(){
    	//$users = User::get();
        $user = Auth::user();
        if ($user->can('viewAny',$user)) {
            //$roles = Role::all();
            $users = $this->userServices->getAllUsers();
            return view('admin.users.index',compact('users'));
        } else {
            return 'You No Authorized';
        }
     //    $users = $this->userServices->getAllUsers();
    	// return view('admin.users.index',compact('users'));
    }

    public function create(){
        
        $user = Auth::user();
        if($user->can('create',$user)){
            $roles = Role::all();
            $permissions = Permission::all();
            return view('admin.users.create',compact('roles','permissions'));
        }
    	else{
            return 'You no Authorized';
        }
    }

    public function show($id){
    	//$user = User::findOrFail($id);
        $user = Auth::user();
        if($user->can('view',$user)){
            $user = $this->userServices->getUserById($id);
            return view('admin.users.show',compact('user'));
        }
        else{
            return 'You no can view';
        }
        
    }

    public function edit($id){
    	$user = User::findOrFail($id);
        $authUser = Auth::user();
        if($authUser->can('update',$authUser,$user)){
            $roles = Role::all();
            return view('admin.users.edit',compact('user','roles'));
        }
        else{
            return 'You cannot update duh';
        }
        
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
        $user->role_id = $request->role_id;
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
        $user->role_id = $request->role_id;
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->date_of_birth = $request->date_of_birth;
        $user->temp_address = $request->temp_address;
        $user->perm_address = $request->perm_address;
    	$user->save();

        
    	return redirect()->route('users.index');
    }

    public function destroy($id){
    	
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->route('users.index');

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
