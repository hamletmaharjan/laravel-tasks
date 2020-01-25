@extends('user.layouts.master')

@section('title','MyApp | Show')

@section('jquery')
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
@endsection



@section('content')
<div class="container">
	<h1>Upload Your Avatar</h1>


	<form method="POST" enctype="multipart/form-data" action="{{route('user.uploadavatar')}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name">Avatar:</label>
		  	<input type="file" class="form-control" id="avatar" name="avatar" value="{{old('avatar')}}" onChange="readURL(this)" required>
		  	<img id="blah" src="#" alt="your image" />
		</div>

		<button type="submit" class="btn btn-default">Ok</button>
		
	</form>
	
</div>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



@endsection