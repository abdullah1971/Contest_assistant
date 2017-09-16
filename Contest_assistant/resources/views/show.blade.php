@extends('layouts.teacher')

@section('contest-related-navigation')

  <ul class="nav nav-sidebar">
    
    <li id="problem-set-nav"><a href="#before-problem-set">Problem Set</a></li>
    {{-- <li id="IO-set-nav" @yield('nav-add-contest')><a href="{{route('contest.create') }}">I/O Set</a></li>

    <li id="judges-solution-nav" @yield('nav-contest-list')><a href="{{route('contest.index') }}">Judges Solution</a></li> --}}
    <li id="editorial-nav"><a href="#before-editorial">Editorial</a></li>

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

<script type="text/javascript"></script>


</head>

<body>



<table margin-top: 50px;>
  
    <tr>
        <th style="text-align: center;">contest Name</th>
        {{-- <th>No. of participates</th> --}}
        <th style="text-align: center;">Date</th>
        <th style="text-align: center;">No. of Problems</th>

    </tr>

    @foreach($data as $value)
        <tr>
        <td style="text-align: center;">{{ $value->name  }}</td>
        {{-- <td>{{ $value->numberofparticipates  }}</td> --}}
        <td style="text-align: center;">{{ $value->date }}</td>
        <td style="text-align: center;">{{ $value->numberofproblems }}</td>

    @endforeach

</table>



<div class="clearfix"></div>

<br>

<div id="before-problem-set" style="height: 50px;"></div>

<h3 style="display: inline-block;" id="problem-sets">Problem Sets</h3>

<a style="padding-top: 15px;" class="pull-right" href="{{ route('problem.additional_problem',['id' => $value->id]) }}"><button class="btn btn-info">Add new problem</button></a>

<div class="list-group">

    @foreach($problemSet as $singleProblem)

        <a style="text-decoration: none;" href="{{ route('problem.show',['id' => $singleProblem->id]) }}">
            <button style="text-align: center;" type="button" class="list-group-item">{{ $singleProblem->problem_name}}</button>
        </a>
  
    @endforeach

</div>



    <div class="clearfix"></div>

    <br>

    <div id="before-editorial" style="height: 50px;"></div>

    <h3 style="display: inline-block;" id="problem-sets">Editorial</h3>


    @if ($editorial)
        
        <a style="padding-top: 15px;" class="pull-right" href="{{ route('problem.add_editorial_update', ['id' => $value->id]) }}"><button class="btn btn-info">Edit</button></a>


        <hr>

        <div class="row">
            <div class="col-sm-offset-1 col-sm-11">
                <pre><p style="font-size: 17px;">{{ $editorial->editorial_body }}</p></pre>
            </div>
        </div>



    @else

        <a style="padding-top: 15px;" class="pull-right" href="{{ route('problem.add_editorial',['id' => $value->id]) }}"><button class="btn btn-info">Add Editorial</button></a>

        <hr>
    
    @endif







@endsection