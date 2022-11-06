@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">User Ngahu</h4>
        </div>
        <div class="card-body">
        <div class="text-success">
                @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
        <form action="{{route('register')}}" method="post">
            {{ csrf_field() }} 
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control  @error('name') border border-danger @enderror" id="name" name="name" value="{{old('name')}}">

                @error('name')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') border border-danger @enderror" id="username" name="username" value="{{old('username')}}">
              
                @error('username')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') border border-danger @enderror" id="email" name="email" value="{{old('email')}}">
            
                @error('email')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="department">Department</label>
                <input type="text" class="form-control @error('department') border border-danger @enderror" id="department" name="department" >
              
                @error('department')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="role_as">Role</label>
                <input type="text" class="form-control @error('role_as') border border-danger @enderror" id="role_as" name="role_as" >
            </div>

            <div class="form-group mb-3">
                <label for="av_days">Number Of Available Leave Days</label>
                <input type="number" class="form-control" id="av_days" name="av_days" value="30" >
              
            </div>
            
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" >
            
                @error('password')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') border border-danger @enderror" id="password_confirmation" name="password_confirmation">
            
                @error('password_confirmation')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>
</div>
</div>
</div>
@endsection