@extends('layouts.teacher')


@section('content')

	<div class="row">

		<div class="col-sm-offset-2 col-sm-8">

			<form class="form-horizontal" method="post" action="{{ route('problem.update_judges_solution_store', ['id' => $id, 'number' => $number, 'no' => $no]) }}">

			{{ csrf_field() }}

			<input type="hidden" name="contest_id" value="{{ $id }}">
			<input type="hidden" name="problem_id" value="{{ $number }}">
			{{-- <input type="hidden" name="solution_id" value="{{ $number }}"> --}}

			  <fieldset>
			    <legend>Edit Judges Solution</legend>

				    

				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">Judges Solution</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" name="judges_solution_body">{{ $judgesSolutionInstance->solution_body }}</textarea>
				        
				    	</div>
		    		</div>

		    		<button type="submit" class="btn btn-primary pull-right">Submit</button>

			  </fieldset>
			</form>

		</div>

	</div>

@endsection