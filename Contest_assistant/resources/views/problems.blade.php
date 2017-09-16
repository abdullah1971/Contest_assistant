@extends('layouts.teacher')
@section('content')

<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>

<script type="text/javascript">
	
	$('#close-alert').alert('close'); // don't work, need to fix it

</script>


</head>


<body>

	<div style="margin-top:50px;">

	{{--$countNumber = 0;--}}

	{{--  $problemNum --}}

	
	<div class="row">

		<div class="col-sm-offset-1 col-sm-8">

			<div  id="close-alert" class="alert alert-dismissible alert-warning">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <h4>Warning!</h4>
			  <p>All the previous Problem set will disappear.</p>
			</div>

			<form method="post" action="{{ route('problem.store') }}" enctype="multipart/form-data">

				{{ csrf_field() }}

				<input type="hidden" name="contest_number" value="{{Request::segment(3)}}">

				@for($i = 0, $alpha = 'A'; $i < $problemNumber; $i++)

					<br>

					<div class="form-group">
					    <label for="" class="col-sm-3 control-label">{{ $alpha++ }})</label><br>
				    </div>
					

					<div class="form-group {{ $errors->has('problem_name-'.$i) ? 'has-error' : '' }}">

					    <label for="problem_name{{"-$i"}}" class="col-sm-3 control-label">Problem Name</label>

					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="problem_name{{"-$i"}}" placeholder="problem name" name="problem_name[]">
					      	<br>
					    </div>

					    @if ($errors->has('problem_name{{"-$i"}}'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('problem_name-'.$i) }}</strong>
			                </span>
			            @endif
				    </div>

					<div class="form-group {{ $errors->has('problem_pdf-'.$i) ? 'has-error' : '' }}">

					    <label for="problem_pdf{{"-$i"}}" class="col-sm-3 control-label">Upload pdf</label>

					    <div class="col-sm-9">
					      <input type="file" class="form-control" id="problem_pdf{{"-$i"}}" placeholder="file" name="problem_pdf[{{"$i"}}]">
					      <br>
					    </div>

					    @if ($errors->has('problem_pdf{{"-$i"}}'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('problem_pdf-'.$i) }}</strong>
			                </span>
			            @endif
				  </div>

				  <div class="clearfix"></div>

				  <br>

			  @endfor

			  <button type="submit" class="pull-right btn btn-info" value="upload">upload</button>
		  </form>
		</div>

	</div>





@endsection