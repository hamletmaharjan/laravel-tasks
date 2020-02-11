@extends('user.layouts.master')

@section('title','MyApp')


@section('content')
<div class="container">
	<h1>My Tasks</h1>
    <div id="mylist"> 
    </div>
	
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

    function loadTasks(){
        $.get("{{route('user.taskgroup.getall')}}",function(data){
            console.log(data);
            var lists = data.tasks;
            var output = '<ul>'
            lists.forEach(function(list){
                output += `<li>
                <input type="checkbox" id="checkbox-${list.id}" value="${list.id}" ${list.pivot.completed ? 'checked' : ''} onClick="updateTask(${list.id})"></input>
                <label><h3>${list.completed ? '<strike>'+list.title+'</strike>' : list.title} </h3></label>
                <img src="{{asset('images/delete.png')}}" style="cursor: pointer;" width="20px" height="20px" name="deleteBtn" onClick="deleteList(${list.id})">
                </li>`
            });
            output += '</ul>';
            document.getElementById('mylist').innerHTML = output;
            console.log(data.lists);
        });
    }
    loadTasks();

    window.updateTask = function(id){

                $.ajax({
                    method:'POST',
                    url:"{{ route('user.task.update') }}",
                    data:{
                        taskid:id
                    },
                    success:function(data){
                        console.log(data);
                       
                        loadTasks();


                        
                    }
                });
            }

    
});
</script>
@endsection