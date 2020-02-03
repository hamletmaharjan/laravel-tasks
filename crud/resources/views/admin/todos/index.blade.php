@extends('admin.layouts.master')

@section('title','MyApp')

@section('content')
<div class="container">
  <h1>To Do List</h1>
  <div id="mylist">
		
	</div>
	<form method="POST">
	  <input type="text" placeholder="E.g. Adopt an owl" name="list_title" id="addtitle">
	  <button type="submit" id="addlist">Add</button>
	</form>
</div>
@endsection


@section('scripts')
<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">

	$('#crap').click(function(){
		$('#crap').hide();
	});


        $(document).ready(function(){
        	$.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            function loadLists(){
            	$.get("{{route('admin.alltodos')}}",function(data){
            		console.log(data.todos);
        			var todos = data.todos;
        			var output = '<ul>'
        			todos.forEach(function(list){
        				output += `<li>
        				<input type="checkbox" id="checkbox-${list.id}" value="${list.id}" ${list.completed ? 'checked' : ''} onClick="updateList(${list.id})"></input>
        				<label><h3>${list.completed ? '<strike>'+list.title+'</strike>' : list.title} </h3></label>
        				<img src="{{asset('images/delete.png')}}" style="cursor: pointer;" width="20px" height="20px" name="deleteBtn" onClick="deleteList(${list.id})">
        				</li>`
        			});
        			output += '</ul>';
        			document.getElementById('mylist').innerHTML = output;
        			
        		});
            }
            loadLists();

            $("#addlist").click(function(e){
                e.preventDefault();
                

                $.ajax({
                    method:'POST',
                    url:"{{ route('storelist') }}",
                    data:{
                        title:$('#addtitle').val(),
                        userid:"{{Auth::user()->id}}"
                    },
                    success:function(data){
                        console.log(data.list.title);
                       
                       	loadLists();


                        
                    }
                });
            });

            window.deleteList = function(id){
            	$.ajaxSetup({
	              headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	              }
	            });
            	
                $.ajax({
                    method:'POST',
                    url:"{{ route('deletelist') }}",
                    data:{
                        listid:id
                    },
                    success:function(data){
                        console.log(data);
                       
                       	loadLists();
                        
                    }
                });
            }

            window.updateList = function(id){

                $.ajax({
                    method:'POST',
                    url:"{{ route('updatelist') }}",
                    data:{
                        listid:id
                    },
                    success:function(data){
                        console.log(data);
                       
                       	loadLists();


                        
                    }
                });
            }

            
        });

  

   

</script>

@endsection