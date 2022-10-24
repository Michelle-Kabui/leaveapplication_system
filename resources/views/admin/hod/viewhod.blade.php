@extends('layouts.master')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Head Of Departments</title>
</head>
<body>

<div class="p-4">

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
</tr>
@endforeach
</table>
</div>

</body>
</html>
@endsection