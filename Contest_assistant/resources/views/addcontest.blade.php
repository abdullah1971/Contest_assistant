@extends('layouts.teacher')

@section('nav-add-contest','class=active')

@section('content')

<div class="row">

	<div class="col-sm-offset-1 col-sm-8">

		<form action="{{ route('contest.index') }}" method="POST" role="form">

			{{ csrf_field() }}

			



			<legend>Contest Info</legend>

			<div class="form-group">
				<label for="name">Contest Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Name"></input>
			</div>

			<div class="form-group">
				<label for="Date">Date of contest</label>
				<input type="Date" class="form-control" id="address" name="Date"></input>
			</div>


			<div class="form-group">
				<label for="Number">Number of problems</label>
				<input type="Number" class="form-control" id="No. of problems" name="numberofproblems"></input>
			</div>

			<button type="submit" class="btn btn-primary pull-right">Submit</button>
			
		</form>
			
	
	</div>

</div>





	
	@endsection