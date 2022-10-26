@extends('layouts.master2')

@section('content')
<!DOCTPE html>
<html>
<head>
<title>View All Staff Members</title>
</head>
<body>

<div class="container-fluid px-4">
<div class="text-success">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
    <div class="card-header">
        <h1>ALL STAFF MEMBERS</h1>
    </div>
    <div class="card-body">
        <div class="">
            <table border = "0" class="table table-striped">
            <tr>
                <td hidden>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Department</td>
                <td>Available Days</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td hidden>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->department }}</td>
                <td>{{ $user->av_days }}</td>
                <td>
                    <a href="{{url('hod/edit-user/'.$user->id)}}" class="btn btn-success">Edit</a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>

    </div>

</div>

</body>
</html>
@endsection