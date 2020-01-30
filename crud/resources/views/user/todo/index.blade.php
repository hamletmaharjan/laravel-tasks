@extends('user.layouts.master')

@section('title','MyApp')

@section('stylesheets')

<style type="text/css">
/* Style the "Add" button */
.addBtn {
  
  cursor: pointer;
  
}
</style>
@endsection

@section('content')
<div class="container">
  	<h1>To Do List</h1>
  	<p id="shit">test</p>
  	<p id="result">Result</p>
  	<div>
	  	<div class="form-group">
	  		<input type="text" id="title" name="title" placeholder="Title...">
	  		<span id="addlist" class="addBtn">Add</span>
	  	</div>
	  	<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="" id="title" name="title[]">
		  <label class="form-check-label" for="defaultCheck1">
		    Do A Task
		  </label>
		</div>
	  	<!-- <div class="list-group">
	  		<input type="checkbox" name="">
	    	<a href="#" class="list-group-item active">First item</a>
	    	<a href="#" class="list-group-item">Second item</a>
	    	<a href="#" class="list-group-item">Third item</a>
	  	</div> -->
  	</div>
</div>
@endsection

@section('jquery')
<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    
    <script>
        $(document).ready(function(){
           
            $('#shit').click(function(){
                $('#shit').hide();
            });

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $("#addlist").click(function(e){
                e.preventDefault();
                

                $.ajax({
                    method:'POST',
                    url:"{{ route('storelist') }}",
                    data:{
                        title:$('#title').val(),
                        userid:"{{Auth::user()->id}}"
                    },
                    success:function(data){
                        console.log(data);
                        $('#result').text(data);
                    }
                });
            });
            
            
        });
    </script>
@endsection