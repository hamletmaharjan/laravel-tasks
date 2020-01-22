<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function showUploadAvatarForm(){
        return view('user.upload');
    }

    public function UploadAvatar(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        //$manager = new ImageManager(array('driver' => 'imagick'));
        //$image = Image::make($request->file('avatar'))->resize(300, 200);
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $avatar = Image::make($image)->resize(100,100);
            $avatar->save(public_path('/images/avatar/'.$imageName));
            $user->avatar = $imageName;
        }
        $user->save();

        return redirect()->route('home');
    }
}
