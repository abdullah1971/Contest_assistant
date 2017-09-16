@extends('layouts.teacher')

@section('content')

<form action="{{route('contests.show')}}" method="POST" role="form">


	{{ csrf_field() }}

		
		
	
	<div style='margin-top: 50px;'>
		<label for="text">Contest</label> 
		<input type="text" class="form-control" id="contest" name="contest" placeholder="contestNo"></input>
	</div>

	<button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>


@endsection
