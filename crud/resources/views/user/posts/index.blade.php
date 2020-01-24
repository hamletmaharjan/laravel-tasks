@extends('user.layouts.master')

@section('title','MyApp')


@section('content')
<div class="container">
	<h1>Posts</h1>

	@foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading"><h4><a class="black-h" href="/post/{{$post->id}}">{{$post->title}}</a></h4>
                <a href="#">edit</a> <a href="#">delete</a>
            </div>
            <div class="panel-body">
                <!-- <img src="user/image/{{$post->image}}"> -->
                <img src="{{asset('/uploads/posts/'.$post->photo)}}">
                <!-- <p>{{$post->description}}</p>
                <p>{{$post->image}}</p> -->
            </div>
        </div>
        <br>
        <hr>
        
    @endforeach
	
</div>


@endsection