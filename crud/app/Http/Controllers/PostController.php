<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostServices;
use Intervention\Image\Facades\Image;
use App\Post;

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
    	//dd($request);
    	$request->validate([
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:255'],
            'photo' => ['required']
        ]);

    	$post = new Post();
    	$post->title = $request->title;
    	$post->description = $request->description;
    	$post->user_id = $request->user_id;

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/posts'),$imageName);
            //$location = public_path('user/images/'.$imageName);
            $post->photo = $imageName;
        }
        //dd($post);
        $post->save();
        return redirect()->route('index');
    }
}
