@extends('user.layouts.master')

@section('title','MyApp | Edit')


@section('content')
<div class="container">
	<form method="POST" action="{{route('users.update',['id'=> $user->id])}}">
		@csrf
		@method('PUT')
		<div class="form-group">
		   	<label for="name">Name:</label>
		  	<input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}" required>
		</div>
		<div class="form-group">
		   	<label for="email">Email address:</label>
		  	<input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}" required>
		</div>
		<div class="form-group">
		   	<label for="contact">Contact:</label>
		  	<input type="text" class="form-control" id="contact" name="contact" value="{{old('contact',$user->contact)}}" required>
		</div>
		<div class="form-group">
			<label for="gender">Gender</label>
			<select class="form-control" id="gender" name="gender">
			   	<option value="male">Male</option>
			    <option value="female">Female</option>
			</select>
		</div>
		<div class="form-group">
			<label for="roles">Role</label>
			<select class="form-control" id="roles" name="roles">
			   	<option value="admin">Admin</option>
			    <option value="superadmin">Super Admin</option>
			</select>
		</div>
		<div class="form-group">
		   	<label for="date_of_birth">Date of Birth:</label>
		  	<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth',$user->date_of_birth)}}" required>
		</div>
		<div class="form-group">
		   	<label for="temp_address">Temporary Address:</label>
		  	<input type="text" class="form-control" id="temp_address" name="temp_address" value="{{old('temp_address',$user->temp_address)}}" required>
		</div>
		<div class="form-group">
		   	<label for="perm_address">Permanent Address:</label>
		  	<input type="text" class="form-control" id="perm_address" name="perm_address" value="{{old('perm_address',$user->perm_address)}}" required>
		</div>
		<!-- <div class="form-group">
		   	<label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password" value="{{$user->password}}" required>
		</div> -->
		
		<button type="submit" class="btn btn-default">Update</button>
	</form>
</div>


@endsection