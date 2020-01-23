<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostServices;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
	protected $postServices;
    public function __construct(PostServices $postServices){
    	$this->postServices = $postServices;
    }

    public function index(){
    	$posts = $this->postServices->getAllPosts();
    	return view('user.posts.index',compact('posts'));
    }

    public function create(){
    	return view('user.posts.create');
    }

    public function store(Request $request){
    	$request->validate([
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:255'],
            'photo' => ['required'],
        ]);
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            dd($image);
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $avatar = Image::make($image)->resize(100,100);
            $avatar->save(public_path('/images/avatar/'.$imageName));
            $user->avatar = $imageName;
        }

        $this->postServices->setPostData($request->all);
        return 'stored i guess';
    }
}
