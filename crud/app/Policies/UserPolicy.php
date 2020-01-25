<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user){
        // return $user->id === $post->user_id 
        //         ? Response::allow() : Response::deny('You do not own this post.');
       
        return $user->hasAccess('view-users');
            
    }

    public function view(User $user){
        return $user->hasAccess('show-user');
    }
}
