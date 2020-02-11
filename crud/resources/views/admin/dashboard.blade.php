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
                  SN
                </th>
                <th>
                  Task Group
                </th>
                <th>
                  Total Tasks
                </th>
                <th>
                  Completed Tasks
                </th>
                <th>Progress</th>
                <th>
                  Due At
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($taskgroups as $taskgroup)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$taskgroup->title}}</td>
              <td>{{$taskgroup->tasks->count()}}</td>
              <td>{{$taskgroup->tasks->where('status',1)->count()}}</td>
              <td>
              @php
              $value = (($taskgroup->tasks->where('status',1)->count())/($taskgroup->tasks->count()))*100;
              @endphp
              <progress id="file" max="100" value="{{$value}}">{{$value}}</progress>
              </td>
              <td>{{ \Carbon\Carbon::parse($taskgroup->due_at)->diffForHumans() }}</td>
              </tr>
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