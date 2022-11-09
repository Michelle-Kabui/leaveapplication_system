@extends('layouts.master2')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Approved Leaves</title>
</head>
<body>

<div class="container-fluid px-4">

<div class="card-header">
<h1>ALL APPROVED LEAVE APPLICATIONS</h1>
</div>

<div class="card-body">
<table border = "0" class="table table-striped">
<tr>
<td>User ID</td>
<td>Email</td>
<td>Leave type</td>
<td>From Date</td>
<td>To Date</td>
<td>Description</td>
<td>Status</td>
<td>Admin Remarks</td>
<td>Number Of Days taken</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->user_id }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->leavetype }}</td>
<td>{{ $user->from_date }}</td>
<td>{{ $user->to_date }}</td>
<td>{{ $user->description }}</td>
<td>{{ $user->status }}</td>
<td>{{ $user->adminRemarks }}</td>
<td>{{ $user->numDays }}</td>
</tr>
@endforeach
</table>
</div>
</div>

</body>
</html>
@endsection