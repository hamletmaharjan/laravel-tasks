@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
	<h1>Settings</h1>

	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

	<ul class="list-group">
	  <li class="list-group-item" ><a href="{{route('user.avatar')}}">Upload Avatar</a></li>
	  <li class="list-group-item"><a href="{{route('users.password')}}">Change Password</a></li>
	  @if (Auth::user()->can('manage-permissions'))
	  <li class="list-group-item"><a href="{{route('admin.manage')}}">Manage Permissions</a></li>
	  @endif
	  
	</ul>
	
</div>
@endsection