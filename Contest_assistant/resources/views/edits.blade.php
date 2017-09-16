@extends('layouts.teacher')

@section('content')


<form class="col-sm-offset-1 col-sm-8" action="{{ route('contest.update',['id' => $data->id]) }}" method="POST" role="form">

		{{ csrf_field() }}

		<input type="hidden" name="_method" value="PUT"></input>




		<legend>Contest Info</legend>
	
		<div class="form-group">
			<label for="name">Contest Name</label>
			<input value= "{{ $data->name}}" type="text" class="form-control" id="name" name="name" placeholder="Name"></input>
		</div>

		<div class="form-group">
			<label for="Date">Date of contest</label>
			<input value= "{{ $data->date  }}" type="Date" class="form-control" id="address" name="Date"></input>
		</div>


		<div class="form-group">
			<label for="Number">Number of problems</label>
			<input value= "{{ $data->numberofproblems  }}" type="Number" class="form-control" id="No. of problems" name="numberofproblems"></input>
		</div>



		<button type="submit" class="btn btn-primary pull-right">Submit</button>
	</form>

	
	@endsection