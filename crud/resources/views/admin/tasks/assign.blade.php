@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
	<h1>Assign a Task</h1>

	<div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Inline forms</h4>
          <p class="card-description">
            Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row
          </p>
          <form class="form-inline" method="POST" action="{{route('task.assign')}}">
            @csrf
            <div class="input-group mb-2 mr-sm-2">
              <label for="exampleSelectGender">Task Groups</label>
                <select class="form-control" id="exampleSelectGender" name="task_group_id">
                	@foreach($taskgroups as $taskgroup)
                  <option value="{{$taskgroup->id}}">{{$taskgroup->title}}</option>
                  @endforeach
                </select>
            </div>
            <div class="input-group mb-2 mr-sm-2">
              <label for="exampleSelectGender">User</label>
                <select class="form-control" id="exampleSelectGender" name="user_id">
                  @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="input-group mb-2 mr-sm-2">
            	<label>Task</label>
            	<input type="text" class="form-control" name="task" placeholder="E.g. Adopt an owl">
            </div>
            <div class="input-group mb-2 mr-sm-2">
              <label>Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Assign</button>
          </form>
        </div>
      </div>
    </div>
	
</div>
@endsection