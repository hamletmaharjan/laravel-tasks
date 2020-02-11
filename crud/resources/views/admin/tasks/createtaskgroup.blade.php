@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <h1>Task</h1>
	<div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Task Group</h4>
          <p class="card-description">
            Create a group
          </p>
          <form class="forms-sample" method="POST" action="{{route('taskgroup.store')}}">
          	@csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Title</label>
              <input type="text" class="form-control" name="title" placeholder="E.g. Laravel">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Due Date</label>
              <input type="date" name="due_at">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
	
</div>
@endsection