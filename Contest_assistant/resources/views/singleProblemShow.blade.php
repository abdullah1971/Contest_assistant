@extends('layouts.teacher')

	

@section('contest-related-navigation')

  <ul class="nav nav-sidebar">
    
    <li id="problem-set-nav"><a href="#before-problem-statement">Problem Statement</a></li>
    <li id="IO-set-nav"><a href="#before-judges-io">I/O Set</a></li>

    <li id="judges-solution-nav"><a href="#before-judges-solution">Judges Solution</a></li>
    <li id="editorial-nav"><a href="#before-problem-solutions">Problem Solutions</a></li>

  </ul>

@endsection




@section('content')
	
	<div id="before-problem-statement" style="height: 50px;"></div>


	<div class="btn-group" role="group" aria-label="...">

	  <h2>Problem Statement</h2>
	  {{-- <button type="button" class="btn btn-info">Left</button> --}}
	  <form style="display: inline-block;" class="pull-right" method="post" action="{{ route('problem.singleProblemDelete', ['id' =>$singleProblem->contest_id, 'number' => $singleProblem->id]) }}">

	  	{{ csrf_field() }}

	  	<input type="hidden" name="_method" value="DELETE">

	  	<button type="submit" class="btn btn-danger pull-right">Delete</button>

	  </form>

	  <a href="{{ route('problem.singleProblemUpdate', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id]) }}">
	  	<button type="button" class="btn btn-warning pull-right">Edit</button>
	  </a>

	  

	  <br><br>
	  <h3 style="color: green;text-align: center;" >{{ $singleProblem->problem_name }}</h3>
	  <embed src="{{ asset($singleProblem->pdf_file_path) }}" width="1000" height="1000">
	</div>

	<div class="clearfix"></div>

	<br><br>

	<div id="before-judges-io" style="height: 50px;"></div>

	<div>

		<h2 style="display: inline-block;">Judge's I/O</h2>

		
		@if ($judgesIOs)
			
			<a href="{{ route('solution.judges_io_update', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id, 'no' => $judgesIOs->id]) }}">
				<button type="button" class="btn btn-info pull-right" style="margin-top: 20px;"">Edit</button>
			</a>

		@else

			<a href="{{ route('solution.judges_io', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id]) }}">
				<button type="button" class="btn btn-info pull-right" style="margin-top: 20px;">Add Judges I/O</button>
			</a>

		@endif
			


			
			

			<hr>


			<div class="row">
				<div class="col-sm-offset-1 col-sm-11">
					<br>
						<pre><p style="font-size: 17px;">@if($judgesIOs){{ $judgesIOs->input_output_body }}@endif</p>
						</pre>

				</div>

			</div>


		

	</div>


	<br><br>


	<div id="before-judges-solution" style="height: 50px;"></div>


	<div>

		<h2 style="display: inline-block;">Judge's Solution</h2>

		
		@if ($judgesSolutions)
			
			<a href="{{ route('problem.update_judges_solution', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id, 'no' => $judgesSolutions->id]) }}">
				<button type="button" class="btn btn-info pull-right" style="margin-top: 20px;"">Edit</button>
			</a>

		@else

			<a href="{{ route('problem.add_judges_solution', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id]) }}">
				<button type="button" class="btn btn-info pull-right" style="margin-top: 20px;">Add Judges Solution</button>
			</a>

		@endif
			


			
			

			<hr>


			<div class="row">
				<div class="col-sm-offset-1 col-sm-11">
					<br>
						<pre><p style="font-size: 17px;">@if($judgesSolutions){{ $judgesSolutions->solution_body }}@endif</p>
						</pre>

				</div>

			</div>


		

	</div>


	<br><br>

	<div id="before-problem-solutions" style="height: 50px;"></div>

	<div>

		<h2 style="display: inline-block;">Problem Solutions</h2>

		<a href="{{ route('problem.solution',['id' => $singleProblem->id]) }}">
	  	<button type="button" class="btn btn-info pull-right" style="margin-top: 20px;">Add Solution</button>
	  </a>

	  <br>

		@foreach($solutions as $singleSolution)

			<h3 style="display: inline-block;">Solved by <strong><span style="color: aqua;">{{ $singleSolution->author }}</span></strong></h3>


			<form style="display: inline-block;" class="pull-right" method="post" action="{{ route('solution.delete', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id, 'no' => $singleSolution->id]) }}">
				{{ csrf_field() }}

        		<input type="hidden" name="_method" value="DELETE">

    			<button class="btn btn-danger"  style="margin-top: 20px;">Delete</button>
			</form>

			{{-- <a class="pull-right" style="display: inline-block;" href="{{ route('solution.update_page', ['id' => $singleProblem->contest_id, 'number' => $singleProblem->id, 'no' => $singleSolution->id]) }}"><button class="btn btn-info">Edit</button></a> --}}

			<hr>


			<div class="row">
				<div class="col-sm-offset-1 col-sm-11">
					<br>
						<pre>
							<p style="font-size: 17px;">{{ $singleSolution->solution }}</p>
						</pre>

				</div>

			</div>

			<br><br>


		@endforeach

	</div>

@endsection
