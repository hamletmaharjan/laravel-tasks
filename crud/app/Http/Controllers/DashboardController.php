<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class DashboardController extends Controller
{
    public function index(){
    	return view('admin.dashboard');
    }

    public function showLoginForm(){
    	return view('admin.auth.login');
    }

    public function manage(){
    	$roles = Role::all();
    	$permissions = Permission::all(); 
    	return view('admin.manage',compact('roles','permissions'));
    }
}
