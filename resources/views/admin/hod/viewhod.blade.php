@extends('layouts.master')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Head Of Departments</title>
</head>
<body>

<div class="p-4">
<div class="text-success">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

<h1>ALL DEPARTMENT HEADS</h1>
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
    <a href="#" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach
</table>
</div>

</body>
</html>
@endsection