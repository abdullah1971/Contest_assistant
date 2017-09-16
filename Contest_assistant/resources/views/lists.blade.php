@extends('layouts.teacher')



@section('nav-contest-list','class=active')


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


</head>

<body>

<div style="margin-top:50px;">

<table id="contest-list-table">
  
  <tr>
    <th>contest Name</th>
    <th>Date</th>
    <th>No. of Problems</th>
    <th>Actions</th>
  </tr>

@foreach($data1 as $value)
  <tr>
    <td>{{ $value->name  }}</td>
    <td>{{ $value->date }}</td>
    <td>{{ $value->numberofproblems }}</td>
    <td> <a href="{{ route('contest.show',['id' => $value->id]) }}"><button class="btn btn-warning">show</button></a> 
     <a href="{{ route('contest.edit',['id' => $value->id]) }}"><button class="btn btn-warning">Edit</button></a> 

    <form action="{{ route('contest.destroy',['id' => $value->id]) }}" method="post" style="display: inline-block;">
    	
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="DELETE">

    	<button class="btn btn-danger">Delete</button>

        
    	
    </form>

    <a href="{{ route('problem.upload',['id' => $value->id, 'number' => $value->numberofproblems]) }}"><button class="btn btn-warning">Add Problem Set</button></a>


  </tr>
  @endforeach

</table>
</div>

</body>
</html>
@endsection