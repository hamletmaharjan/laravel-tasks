@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <h1>All Users</h1>
	
	<table class="table">
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Email</th>
			<th>Joined at</th>
			<th>Action</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td><a href="{{route('users.show',['id' => $user->id ])}}">{{$user->name}}</a></td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
			<td><a href="{{route('users.edit',['id' => $user->id ])}}">Edit</a>
				<form method="POST" action="{{route('users.destroy',['id' => $user->id])}}">
					@csrf
					@method('DELETE')
					<button type="submit" onclick="return confirm('you sure?')">Delete</button>
				</form>
			</td>
		</tr>

		@endforeach
	</table>
</div>
@endsection