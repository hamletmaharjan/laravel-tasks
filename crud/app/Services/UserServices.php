<?php

namespace App\Services;

use App\User;

/**
 * 
 */
class UserServices
{
	protected $user;
	function __construct(User $user){
		$this->user = $user;
	}

	public function getAllUsers(){
		return $this->user->get();
	}

	public function getUserById($id){
		return $this->user->where('id','=',$id)->first();
	}

	public function setUserData($data){
		//
	}

	public function updateUserData($data,$id){
		//
	}
}