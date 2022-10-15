@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1>LOGIN PAGE</h1>
        @if (session('status'))
            {{ session('status') }}
        @endif

        <form action="{{route('login')}}" method="post">
            {{ csrf_field() }} 
    
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group mb-3">
                <input type="checkbox" class="mr-2" id="remember" name="remember">
                <label for="remember">Remember me</label>
                
            </div>
  

            
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

    </div>
@endsection