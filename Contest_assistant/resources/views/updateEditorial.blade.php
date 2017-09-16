@extends('layouts.teacher')


@section('content')

	<div class="row">

		<div class="col-sm-offset-2 col-sm-8">

			<form class="form-horizontal" method="post" action="{{ route('problem.add_editorial_update_store', ['id' => $id]) }}">

			{{ csrf_field() }}

			<input type="hidden" name="contest_id" value="{{ $id }}">
			<input type="hidden" name="editorial_id" value="{{ $editorialInstance->id }}">
			

			  <fieldset>
			    <legend>Update Editorial</legend>

				    

				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">Editorial</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" name="editorial_body">{{ $editorialInstance->editorial_body }}</textarea>
				        
				    	</div>
		    		</div>

		    		<button type="submit" class="btn btn-primary pull-right">Submit</button>

			  </fieldset>
			</form>

		</div>

	</div>

@endsection