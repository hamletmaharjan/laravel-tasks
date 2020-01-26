@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <form method="POST" action="{{route('users.store')}}">
		@csrf
		<div class="form-group">
		   	<label for="name">Name:</label>
		  	<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
		</div>
		@error('name')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="email">Email address:</label>
		  	<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
		</div>
		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password" value="{{old('password')}}" required>
		</div>
		@error('password')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		  <label for="role">Role</label>
		  <select class="form-control" id="role_id" name="role_id">
		    @foreach($roles as $role)
		    <option value="{{$role->id}}">{{$role->name}}</option>
		    @endforeach
		  </select>
		</div>
		@error('roles')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<!-- <div class="form-group">
			<label for="contact">Permissions:</label>
			@foreach($permissions as $permission)
			<div class="checkbox">
			  <label><input type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
			</div>
			@endforeach
		</div> -->
		<div class="form-group">
		   	<label for="contact">Contact:</label>
		  	<input type="text" class="form-control" id="contact" name="contact" value="{{old('contact')}}" required>
		</div>
		<div class="form-group">
			<label for="gender">Gender:</label>
			<select class="form-control" id="gender" name="gender">
			   	<option value="male">Male</option>
			    <option value="female">Female</option>
			</select>
		</div>
		@error('gender')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="date_of_birth">Date of Birth:</label>
		  	<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth')}}" required>
		</div>
		@error('date_of_birth')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="temp_address">Temporary Address:</label>
		  	<input type="text" class="form-control" id="temp_address" name="temp_address" value="{{old('temp_address')}}" required>
		</div>
		@error('temp_adddress')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="form-group">
		   	<label for="perm_address">Permanent Address:</label>
		  	<input type="text" class="form-control" id="perm_address" name="perm_address" value="{{old('perm_address')}}" required>
		</div>
		@error('perm_address')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="checkbox">
		    <label><input type="checkbox"> Remember me</label>
		</div>
		 	<button type="submit" class="btn btn-default">Create</button>
	</form>
</div>
@endsection