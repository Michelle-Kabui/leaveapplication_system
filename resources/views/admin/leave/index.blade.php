@extends('layouts.master')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Leaves</title>
</head>
<body>

<div class="container-fluid px-4">

<div class="card-header">
<h1>ALL LEAVES</h1>
</div>

<div class="card-body">
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
    <a href="{{url('admin/delete-leave/'.$leave->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete leave type:[{{$leave->LeaveType}}] from the system ')">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>
</div>

</body>
</html>
@endsection