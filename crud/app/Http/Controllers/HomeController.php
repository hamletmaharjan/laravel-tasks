<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

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
        $manager = new ImageManager(array('driver' => 'imagick'));
        $image = Image::make($request->file('avatar'))->resize(300, 200);
        dd($request);
    }
}
