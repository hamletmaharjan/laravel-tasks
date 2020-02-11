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
                  Task Group
                </th>
                <th>
                  Tasks
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
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endif
</div>
@endsection