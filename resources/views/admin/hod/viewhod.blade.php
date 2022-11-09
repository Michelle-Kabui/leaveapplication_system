@extends('layouts.master')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Head Of Departments</title>
</head>
<body>
<div class="container-fluid px-4">

<div class="text-success">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
<div class="card-header">
<h1>ALL DEPARTMENT HEADS</h1>
</div>
<div class="card-body">
<table border = "0" class="table table-striped">
<tr>
<td>Name</td>
<td>Email</td>
<td>Department</td>
<td>Available Days</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->department }}</td>
<td>{{ $user->av_days }}</td>
<td>
    <a href="{{url('admin/edit-hod/'.$user->id)}}" class="btn btn-success">Edit</a>
</td>
<td>
    <a href="{{url('admin/delete-hod/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure You want to delete HOD:[{{$user->name}}] from the system ')">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>
</div>

</body>
</html>
@endsection