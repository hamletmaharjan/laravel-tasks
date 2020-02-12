@extends('user.layouts.master')

@section('title','MyApp')


@section('content')
<div class="container">
	<h1>My Tasks</h1>
    @foreach($taskgroups as $taskgroup)
        <h3>{{$taskgroup->title}}</h3>
        <ul>
        @foreach($taskgroup->tasks as $task)
            <li>
                <input type="checkbox"  name="task[]" value="{{$task->id}}" onclick="updateTask({{$task->id}})"></input>
                <label>{{$task->title}}</label>
            </li>
        @endforeach
        </ul>
    @endforeach
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

     $.get("{{route('user.taskgroup.getall')}}",function(data){
        console.log(data);
     });
    // function loadTasks(){
    //     $.get("{{route('user.taskgroup.getall')}}",function(data){
    //         console.log(data);
    //         var lists = data.taskgroups;
    //         var output = '';
    //         lists.forEach(function(group){
    //             output += `<h3>${group.title}</h3> <ul>`
    //             group.forEach(function(list){
    //                 output += `<ul><li>
    //                 <input type="checkbox" id="checkbox-${list.id}" value="${list.id}"  onClick="updateTask(${list.id})"></input>
    //                 <label><h3>${list.title}</h3></label>
    //                 <img src="{{asset('images/delete.png')}}" style="cursor: pointer;" width="20px" height="20px" name="deleteBtn" onClick="deleteList(${list.id})">
    //                 </li>`
    //             });
                
    //         });
    //         output += '</ul>';
    //         document.getElementById('mylist').innerHTML = output;
    //         console.log(data.lists);
    //     });
    // }
    // loadTasks();

    window.updateTask = function(id){

                $.ajax({
                    method:'POST',
                    url:"{{ route('user.task.update') }}",
                    data:{
                        taskid:id
                    },
                    success:function(data){
                        console.log(data); 
                    }
                });
            }
});
</script>
@endsection