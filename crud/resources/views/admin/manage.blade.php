@extends('admin.layouts.master')

@section('title','MyApp')

@section('stylesheets')
<!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> -->
@endsection

@section('content')
<div class="container">
	<h1>Manage</h1>
	<h2>Permission for roles</h2>

	<!-- @foreach($roles as $role)
	<div class="panel panel-default">
	  <div class="panel-heading"><h3>{{$role->name}}</h3></div>
	  @foreach($permissions  as $permission)
	  <div class="panel-body">{{$permission->name}}</div>
	  <div class="form-group">
	  	<div class="checkbox">
			  <label><input type="checkbox" value="{{$permission->id}}">{{$permission->name}}</label>
		</div>
	  </div>
	  	
	  @endforeach
	</div>
	@endforeach -->
	<form method="POST" action="{{route('admin.setpermissions')}}">
		@csrf
	@foreach($roles as $role)
	<div class="modal-content">
	  <div class="modal-header"><h3>{{$role->name}}</h3></div>
	  @foreach($permissions  as $permission)
	  <!-- <div class="panel-body">{{$permission->name}}</div> -->
	  <div class="modal-body">
	  	<div class="checkbox">
			  <label><input type="checkbox" name="permissions[{{$role->id}}][]" value="{{$permission->id}}" {{$role->permissions->contains('id',$permission->id) ? 'checked' : ''}}>{{$permission->name}}</label>
		</div>
	  </div>
	  	
	  @endforeach
	</div>
	@endforeach
	<button type="submit">Submit</button>
	</form>
	
</div>
@endsection

