<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class,'user_id');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    // public function crap(){
    //     return $this->role;
    // }

    public function hasAccess($permission){
        //dd($this->role->permissions);
        if($this->role->permissions->contains('name',$permission)){
            return true;
        }
        else{
            return false;
        }

        // foreach ($this->role->permissions as $perm) {
        //     if($perm->name == $permission){
        //         return true;
        //     }
        // }
        // return false;
    }
}
