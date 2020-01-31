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

	<!-- <button type="button" id="getTasks">Get Tasks</button> -->
	<div id="mylist">
		
	</div>
	<form method="POST">
	  <input type="text" placeholder="E.g. Adopt an owl" name="list_title" id="addtitle">
	  <button type="submit" id="addlist">Add</button>
	</form>
  	
</div>
@endsection

@section('jquery')
<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">


        $(document).ready(function(){
        	$.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            function loadLists(){
            	$.get("{{route('getlists')}}",function(data){
        			var lists = data.lists;
        			var output = '<ul>'
        			lists.forEach(function(list){
        				output += `<li>
        				<input type="checkbox" id="checkbox-${list.id}" value="${list.id}"></input>
        				<label><h3>${list.title}</h3></label>
        				<img src="{{asset('images/delete.png')}}" style="cursor: pointer;" width="20px" height="20px" name="deleteBtn" onClick="deleteList(${list.id})">
        				</li>`
        			});
        			output += '</ul>';
        			document.getElementById('mylist').innerHTML = output;
        			console.log(data.lists);
        		});
            }
            loadLists();
        	// $('#getTasks').click(function(e){
        	// 	$.get("{{route('getlists')}}",function(data){
        	// 		var lists = data.lists;
        	// 		var output = '<ul>'
        	// 		lists.forEach(function(list){
        	// 			output += `<li>
        	// 			<input type="checkbox" id="checkbox-${list.id}" value="${list.id}"></input>
        	// 			<label>${list.title}</label></li>`
        	// 		});
        	// 		output += '</ul>';
        	// 		document.getElementById('mylist').innerHTML = output;
        	// 		console.log(data.lists);
        	// 	});
        	// });
        	

            

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

            
            
            
        });

  

   

</script>

@endsection