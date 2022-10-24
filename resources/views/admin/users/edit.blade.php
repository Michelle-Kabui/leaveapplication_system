@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit User Data</h4>
        </div>
        <div class="card-body">
        <div class="text-success">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
        <form action="{{url('admin/update-user/'.$user->id)}}" method="post">
            {{ csrf_field() }} 
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" value="{{$user->name}}" class="form-control  @error('name') border border-danger @enderror" id="name" name="name" value="{{old('name')}}">

                @error('name')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" value="{{$user->username}}"  class="form-control @error('username') border border-danger @enderror" id="username" name="username" value="{{old('username')}}">
              
                @error('username')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text"  value="{{$user->email}}" class="form-control @error('email') border border-danger @enderror" id="email" name="email" value="{{old('email')}}">
            
                @error('email')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="department">Department</label>
                <input type="text"  value="{{$user->department}}" class="form-control @error('department') border border-danger @enderror" id="department" name="department" >
              
                @error('department')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="role_as">Role</label>
                <select name="role_as" id="role_as" class="form-control"  value="{{$user->role_as}}" >
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                    <option value="2">HOD</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="av_days"  >Number Of Available Leave Days</label>
                <input type="number"  value="{{$user->av_days}}" class="form-control" id="av_days" name="av_days" value="30" >
              
            </div>

            
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>
</div>
</div>
</div>
@endsection