@extends('layouts.teacher')


@section('content')

	<div class="row">

		<div class="col-sm-offset-2 col-sm-8">

			<form class="form-horizontal" method="post" action="">

			{{ csrf_field() }}

				<input type="hidden" name="solution_id" value="{{ $solutionInstance->id }}">

			{{-- <input type="hidden" name="problem_id" value="{{ $id }}"> --}}

			  <fieldset>
			    <legend>Update Solution</legend>

				    <div class="form-group">
				      <label for="author" class="col-lg-2 control-label">Author</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" id="author" placeholder="Author" name="solution_author" value="{{ $solutionInstance->author }}">
				      </div>
				    </div>

				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">Solution</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" name="problem_solution"
				        	>{{ $solutionInstance->solution }}</textarea>
				        
				    	</div>
		    		</div>

		    		<button type="submit" class="btn btn-primary pull-right">Submit</button>

			  </fieldset>
			</form>

		</div>

	</div>

@endsection