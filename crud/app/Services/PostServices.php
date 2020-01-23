<?php

namespace App\Services;

use App\Post;


/**
 * 
 */
class PostServices
{
	protected $post;
	function __construct(Post $post){
		$this->post = $post;
	}

	public function getById($id){
		return $this->post->where('id','=',$id)->first();
	}

	public function getPostsCount(){
		return $this->post->get()->count();
	}

	public function getAllPosts(){
		return $this->post->get();
	}

	public function setPostData($data){
		return $post->create($data);
	}
}