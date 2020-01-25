<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
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

    public function edit($id){
    	$user = Auth::user();
    	$post = Post::findOrFail($id);
    	if ($user->can('update', $post)) {
	      	return view('user.posts.edit',compact('post'));
	    } else {
	      	return 'Not Authorized';
	    }
    	//$post = $this->postServices->getById($id);
    	
    }

    public function update(Request $request, $id){
    	//
    }

    public function delete($id){
    	$user = Auth::user();
    	$post = Post::findOrFail($id);
    	if ($user->can('update', $post)) {
	      	$post->delete();
	      	return redirect()->route('index');
	    } else {
	      	return 'Not Authorized';
	    }
    }
}