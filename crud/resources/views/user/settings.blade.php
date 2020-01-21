@extends('user.layouts.master')

@section('title','MyApp | Index')


@section('content')
<div class="container">
	<h1>Settings</h1>

	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

	<ul class="list-group">
	  
	  <li class="list-group-item"><a href="{{route('users.password')}}">Change Password</a></li>
	  <li class="list-group-item">Morbi leo risus</li>
	  <li class="list-group-item">Porta ac consectetur ac</li>
	  <li class="list-group-item">Vestibulum at eros</li>
	</ul>
	
</div>


@endsection