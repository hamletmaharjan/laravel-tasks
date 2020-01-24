@extends('user.layouts.master')

@section('title','MyApp')


@section('content')
<div class="container">
	<h1>Edit a Post</h1>
        <form method="POST" action="{{route('post.update',['id'=>$post->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo')}}" onChange="readURL(this)" required>
                <img id="blah" src="#" alt="your image" />
            </div>
            @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> -->
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
	
</div>


@endsection

@section('scripts')
@endsection