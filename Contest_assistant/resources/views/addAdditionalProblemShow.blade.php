@extends('layouts.teacher')

@section('contest-related-navigation')

  <ul class="nav nav-sidebar">
    
    {{-- <li id="problem-set-nav" class="active" @yield('nav-contest-list')><a href="{{ route('problem.show', []) }}">Problem Set</a></li> --}}
    

    

  </ul>

@endsection


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

			<?php

			 

			 $alpha = 'A';

			 for($i = 0; $i < $problemNumbers; $i++)
			 	$alpha++;

			 	

			 ?>

			<form method="post" action="{{ route('problem.additional_problem_store', ['id' => $id]) }}" enctype="multipart/form-data">

				{{ csrf_field() }}

				{{-- {{ $problemNumbers }} --}}

				<input type="hidden" name="contest_number" value="{{Request::segment(3)}}">

				<input type="hidden" name="number_of_problems_has_been_added" value="{{ $problemNumbers }}">



				

					

					<div class="form-group">
					    <label for="" class="col-sm-3 control-label">{{ $alpha }})</label><br>
				    </div>
					

					<div class="form-group {{ $errors->has('problem_name') ? 'has-error' : '' }}">

					    <label for="problem_name" class="col-sm-3 control-label">Problem Name</label>

					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="problem_name" placeholder="problem name" name="problem_name">
					      	<br>
					    </div>

					    @if ($errors->has('problem_name'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('problem_name') }}</strong>
			                </span>
			            @endif
				    </div>

					<div class="form-group {{ $errors->has('problem_pdf') ? 'has-error' : '' }}">

					    <label for="problem_pdf" class="col-sm-3 control-label">Upload pdf</label>

					    <div class="col-sm-9">
					      <input type="file" class="form-control" id="problem_pdf" placeholder="file" name="problem_pdf">
					      <br>
					    </div>

					    @if ($errors->has('problem_pdf'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('problem_pdf') }}</strong>
			                </span>
			            @endif
				  </div>

				  <div class="clearfix"></div>

				  <br>

			  

			  <button type="submit" class="pull-right btn btn-info" value="upload">upload</button>
		  </form>
		</div>

	</div>





@endsection