@extends('layouts.master')

@section('content')
<html>
<head>
<title>View All Departments</title>
</head>
<body>

<div class="container-fluid px-4">

    <div class="text-success">
        @if (session('status'))
        {{ session('status') }}
    @endif
    </div>

<div class="card-header">
<h1>ALL DEPARTMENTS</h1>
</div>
<div class="card-body">
<table border = "2" class="table table-striped table-bordered ">
<tr>
<td>Department Name</td>
<td>Shortform</td>
</tr>
@foreach ($departments as $department)
<tr>
<td>{{ $department->departmentname }}</td>
<td>{{ $department->shortform }}</td>
<td>
    <a href="#" class="btn btn-success">Edit</a>
</td>
<td>
    <a href="{{url('admin/delete-department/'.$department->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete department:[{{$department->departmentname}}] from the system ')">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>
</div>
</body>
</html>
@endsection