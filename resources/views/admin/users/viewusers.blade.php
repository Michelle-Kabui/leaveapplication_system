@extends('layouts.master')

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="user_delete_id" id="user_id">
        <h5>Are you sure you want to delete this user ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
                    <a href="{{url('admin/edit-user/'.$user->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <!-- <a href="{{url('admin/delete-user/'.$user->id)}}" class="btn btn-danger">Delete</a> -->
                    <button type="button" class="btn btn-danger deleteUserBtn" value="{{$user->id}}">Delete</button>
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

@section('scripts')

<script>
    $(document).ready(function(){
        $('.deleteUserBtn').click(function(e){
            e.preventDefault();

            var user_id = $(this).val();
            $('#user_id').val(user_id);

            $('#deleteModal').modal('show');
        });

    });
</script>

@endsection