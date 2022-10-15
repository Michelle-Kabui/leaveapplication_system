@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1>REGISTRATION PAGE</h1>
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

            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

    </div>
@endsection