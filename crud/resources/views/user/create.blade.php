@extends('user.layouts.app')

@section('title','MyApp | Create')


@section('content')
<div class="row">
	<form method="POST" action="{{route('users.store')}}">
		@csrf
		<div class="form-group">
		   	<label for="name">Name:</label>
		  	<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
		   	<label for="email">Email address:</label>
		  	<input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
		   	<label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password">
		</div>
		<div class="checkbox">
		    <label><input type="checkbox"> Remember me</label>
		</div>
		 	<button type="submit" class="btn btn-default">Create</button>
	</form>
</div>


@endsection