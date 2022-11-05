@extends('layouts.master')

@section('content')
<!DOCTPE html>
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
<td>Leave Type</td>
<td>Duration</td>
</tr>
@foreach ($leaves as $leave)
<tr>
<td>{{ $leave->id }}</td>
<td>{{ $leave->LeaveType }}</td>
<td>{{ $leave->Duration }}</td>
<td>
    <a href="#" class="btn btn-success">Edit</a>
</td>
<td>
    <a href="#" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>

</body>
</html>
@endsection