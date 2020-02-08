@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <div class="row">
  <h1>Hello World</h1>
  @if (Auth::user()->can('view-report'))
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <p class="card-description">
          Add class <code>.table-striped</code>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  User
                </th>
                <th>
                  Name
                </th>
                <th>
                  Task
                </th>
                <th>
                  Assigned At
                </th>
                <th>
                  Due At
                </th>
                <th>
                  Completed At
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <!-- @php
                $total = 0;
                $completed = 0;
                foreach($user->tasks as $task){
                  if($task->pivot->completed){
                    $completed++;
                  }
                  $total++;
                }
                $value = ($completed/$total)*100;
              @endphp -->
              @foreach($user->tasks as $task)
              <tr>
                <td class="py-1">
                  <img src="{{asset('/uploads/user/image/avatar/thumbnail/'.$user->avatar)}}" alt="image">
                </td>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  {{$task->title}}
                  <!-- <progress id="progress" max="100" value="{{$value}}"></progress> -->
                  <!-- <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </td>
                <td>
                  {{$task->pivot->assigned_at}}
                </td>
                <td>
                  {{$task->due_at}}
                </td>
                <td>
                  @if($task->pivot->completed)
                  {{$task->pivot->completed_at}}
                  @else
                  not completed
                  @endif
                </td>
              </tr>

              @endforeach
              
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endif
</div>
@endsection