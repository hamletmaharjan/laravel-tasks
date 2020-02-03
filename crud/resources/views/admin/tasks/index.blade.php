@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
	<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Tasks</h4>
	      <p class="card-description">
	        All Tasks
	      </p>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr>
	              <th>S.N</th>
	              <th>Title</th>
	              <th>Description</th>
	              <th>Status</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	            <!-- <tr>
	              <td>Jacob</td>
	              <td>Photoshop</td>
	              <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
	              <td><label class="badge badge-danger">Pending</label></td>
	            </tr> -->
	            @foreach($tasks as $task)
	            <tr>
	            	<td>{{$loop->iteration}}</td>
	            	<td>{{$task->title}}</td>
	            	<td>{{$task->description}}</td>
	            	<td><label class="badge badge-danger">Pending</label></td>
	            	<td><a href="{{route('task.edit',['id'=>$task->id])}}">edit</a> <a href="#">delete</a></td>
	            </tr>
	            @endforeach
	            
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
	
</div>
@endsection