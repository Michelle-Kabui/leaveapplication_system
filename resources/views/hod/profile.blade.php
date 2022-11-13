@extends('layouts.master2')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">User Profile
                <a href="{{url('change-password')}}" class="btn btn-primary float-end">Change Password</a>
            </h4>
        </div>
        <div class="card-body">
        <div class="text-success">
                @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
        <form action="{{url('update-user')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} 
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control  @error('name') border border-danger @enderror" id="name" name="name" value="{{auth()->user()->name}}" disabled>

                @error('name')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') border border-danger @enderror" id="username" name="username" value="{{auth()->user()->username}}" disabled>
              
                @error('username')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') border border-danger @enderror" id="email" name="email" value="{{auth()->user()->email}}" disabled>
            
                @error('email')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="department">Department</label>
                <input type="text" class="form-control @error('department') border border-danger @enderror" id="department" name="department" value="{{auth()->user()->department}}" disabled>
              
                @error('department')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="picture">Picture</label>
                <input type="file" class="form-control @error('picture') border border-danger @enderror" id="picture" name="picture" value="{{auth()->user()->picture}}" >
              
                @error('picture')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="tnumber">Telephone Number</label>
                <input type="number" class="form-control @error('tnumber') border border-danger @enderror" id="tnumber" name="tnumber" value="{{auth()->user()->tnumber}}" >
              
                @error('tnumber')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') border border-danger @enderror" id="address" name="address" value="{{auth()->user()->address}}" >
              
                @error('address')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="gender">Gender</label>
                <input type="text" class="form-control @error('gender') border border-danger @enderror" id="gender" name="gender" value="{{auth()->user()->gender}}" >
              
                @error('gender')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control @error('nationality') border border-danger @enderror" id="nationality" name="nationality" value="{{auth()->user()->nationality}}" >
              
                @error('nationality')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="IDno">National Id Number</label>
                <input type="number" class="form-control @error('IDno') border border-danger @enderror" id="IDno" name="IDno" value="{{auth()->user()->IDno}}" >
              
                @error('IDno')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <h3>Emergency Contact</h3>
            <div class="form-group mb-3">
                <label for="ename">Name</label>
                <input type="text" class="form-control @error('ename') border border-danger @enderror" id="ename" name="ename" value="{{auth()->user()->ename}}" >
              
                @error('ename')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="etnumber">Telephone Number</label>
                <input type="text" class="form-control @error('etnumber') border border-danger @enderror" id="etnumber" name="etnumber" value="{{auth()->user()->etnumber}}" >
              
                @error('etnumber')
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