@extends('layouts.master')

@section('content')
<html>
<head>
<title>View All Departments</title>
</head>
<body>

<div>
    
</div>
<div class="p-4 card-body">

<h1>ALL DEPARTMENTS</h1>
<table border = "0" class="table table-striped">
<tr>
<td> ID</td>
<td>Department Name</td>
<td>Shortform</td>
</tr>
@foreach ($departments as $department)
<tr>
<td>{{ $department->id }}</td>
<td>{{ $department->departmentname }}</td>
<td>{{ $department->shortform }}</td>
<td>
    <a href="#" class="btn btn-success">Edit</a>
</td>
<td>
    <a href="#" class="btn btn-success">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>

</body>
</html>
@endsection