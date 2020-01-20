@extends('user.layouts.master')

@section('title','MyApp | Edit')


@section('content')
<div class="container">
	<form method="POST" action="{{route('users.update',['id'=> $user->id])}}">
		@csrf
		@method('PUT')
		<div class="form-group">
		   	<label for="name">Name:</label>
		  	<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
		</div>
		<div class="form-group">
		   	<label for="email">Email address:</label>
		  	<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
		</div>
		<div class="form-group">
		   	<label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password" value="{{$user->password}}">
		</div>
		
		<button type="submit" class="btn btn-default">Update</button>
	</form>
</div>


@endsection