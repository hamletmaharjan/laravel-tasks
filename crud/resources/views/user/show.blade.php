@extends('user.layouts.master')

@section('title','MyApp | Show')


@section('content')
<div class="container">
	<h1>User Details</h1>
	<p>Id : {{$user->id}}</p> 
	<p>Email : {{$user->email}}</p>
	<p>Contact : {{$user->contact}}</p>
	<p>Date of Birth : {{$user->date_of_birth}}</p>
	<p>Gender : {{$user->gender}}</p>
	<p>Temporary Address : {{$user->temp_address}}</p>
	<p>Permanent Address : {{$user->perm_address}}</p>
	<p>Created At : {{$user->created_at}}</p>

	<div class="row">
	<a href="{{route('users.edit',['id' => $user->id ])}}">Edit</a>
					<form method="POST" action="{{route('users.destroy',['id' => $user->id])}}">
						@csrf
						@method('DELETE')
						<button type="submit" onclick=" return confirm('you sure?')">Delete</button>
					</form>
			
	</div>
	
</div>



@endsection