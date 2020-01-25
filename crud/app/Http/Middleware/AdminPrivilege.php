<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminPrivilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->roles == 'superadmin'){
                //return Auth::user()->roles;
                //dd(Auth::user()->roles);
                return $next($request);
            }
        }
        //dd(Auth::user()->roles);
        return redirect('/')->with('error','You are restricted');
        
    }
}
