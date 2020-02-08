@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <h1>Task</h1>
	<div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create</h4>
          <p class="card-description">
            Add a task
          </p>
          <form class="forms-sample" method="POST" action="{{route('task.store')}}">
          	@csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Title</label>
              <input type="text" class="form-control" name="title" placeholder="E.g. Adopt an Owl">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text" class="form-control" name="description" placeholder="Description">
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