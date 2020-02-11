<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;
use Carbon\Carbon;
use App\User;

class DashboardController extends Controller
{

    public function __construct(){
        //
    }

    public function index(){
        
        // $users = User::whereHas(
        //     'role', function($q){
        //         $q->where('name', 'user');
        //     }
        // )->get();

        if(Gate::allows('view-report')){
           
            
            return view('admin.dashboard',compact('users'));
        }
    	return view('admin.dashboard');
    }

    public function showLoginForm(){
    	return view('admin.auth.login');
    }

    //show permissions for all roles
    public function manage(){
        if (Gate::allows('manage-permissions')) {
            $roles = Role::all();
            $permissions = Permission::all(); 
            return view('admin.manage',compact('roles','permissions'));
        }
        else{
            return 'you cannot handle permissions';
        }
    	
    }

    public function setPermissions(Request $request){
        $len = Role::count();
        $test = DB::delete('delete from permission_role');
        foreach ($request->permissions as $roleId => $permission) {
            //if($permission)
        	$roles = Role::find($roleId);
        	$roles->permissions()->sync($permission);
        }

        // for ($i=1; $i<=$len $i++) {
            
        // }
        
        return redirect()->route('admin.manage');
        
    }
}
