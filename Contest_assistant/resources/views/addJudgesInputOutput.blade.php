@extends('layouts.teacher')


@section('content')

	<div class="row">

		<div class="col-sm-offset-2 col-sm-8">

			<form class="form-horizontal" method="post" action="{{ route('solution.judges_io_store', ['id' => $id, 'number' => $number]) }}">

			{{ csrf_field() }}

			<input type="hidden" name="contest_id" value="{{ $id }}">
			<input type="hidden" name="problem_id" value="{{ $number }}">

			  <fieldset>
			    <legend>Add Judges I/O Set</legend>

				    

				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">I/O Set</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" name="input_output_body"></textarea>
				        
				    	</div>
		    		</div>

		    		<button type="submit" class="btn btn-primary pull-right">Submit</button>

			  </fieldset>
			</form>

		</div>

	</div>

@endsection