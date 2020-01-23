@extends('user.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Session::has('error'))
                    <div class="alert alert-danger">
                      {{\Session::get('error')}}
                    </div>
                  @endif
            <div class="card">

                <div class="card-header">Dashboard</div>
                
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <p> Last Login </p>
                    <!-- {{\Carbon\Carbon::now()->diffForHumans(Auth::user()->last_login_at)}} -->

                    @if (session('time'))
                        
                            {{ session('time') }}
                        
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
