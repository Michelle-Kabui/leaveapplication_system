@extends('layouts.app')

@section('content')
    <div class="text-danger">
        @if (session('status'))
            {{ session('status') }}
        @endif
    </div>
    {{-- <div class="p-5">
        <h1>LOGIN PAGE</h1>
        <div class="text-danger">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
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

    </div> --}}
    <div class="login-container">
        <div class="login-text">
            <h1>Welcome to the AAmanufacturing <br> Leave Out System</h1>
            <p>Kindly login to access your account</p>
            <img class="login-image" src="./logo.svg" alt="">
        </div>
        <div class="login-form">
            <form action="{{route('login')}}" method="post">
                {{ csrf_field() }} 
        
                <div class="form-input-container">
                    <input class="form-input" placeholder="Email" type="text" class="" id="email" name="email">
                </div>
                <div class="form-input-container">
                    <input class="form-input" placeholder="Password" type="password" class="" id="password" name="password">
                </div>
                <div class="">
                    <input type="checkbox" class="" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                    
                </div>
                <div class="login-btns">
                    <button type="submit" class="btn login-btn">Login</button>
                    <button type="reset" class="btn login-btn login-btn-red">Cancel</button>
                </div>
    
            </form>
        </div>
    </div>
@endsection