@extends('user.layouts.master')

@section('title','MyApp | Create')


@section('content')
<div class="container">
	<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
	<form method="POST" action="{{route('users.store')}}">
		@csrf
		<div class="form-group">
		   	<label for="name">Name:</label>
		  	<input type="text" class="form-control" id="name" name="name">
		</div>
		@error('name')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="email">Email address:</label>
		  	<input type="email" class="form-control" id="email" name="email">
		</div>
		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password">
		</div>
		@error('password')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="sel1">Role</label>
		  <select class="form-control" id="roles" name="roles">
		    <option value="admin">admin</option>
		    <option value="superadmin">superadmin</option>
		  </select>
		</div>
		@error('roles')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="checkbox">
		    <label><input type="checkbox"> Remember me</label>
		</div>
		 	<button type="submit" class="btn btn-default">Create</button>
	</form>
</div>


@endsection