@extends('layouts.master2')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
        <h1>LEAVE FORM</h1>
        </div>
        <div class="card-body">
        <div class="fw-light text-danger">
            @if (session('status'))
            {{ session('status') }}
        @endif
        </div>
        
        <form action="{{url('hod/update-leave/'.$user->id)}}" method="post">
            {{ csrf_field() }} 
            @method('PUT')
            <div class="form-group mb-3">
                <label for="email" >Email</label>
                <input type="text" class="form-control  @error('email') border border-danger @enderror" id="email" name="email"
                value="{{$user->email}}" disabled>

                @error('email')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="leavetype">Leave Type</label>
                <input type="text" value="{{$user->leavetype}}" id="leavetype" name="leavetype" disabled>
              
                @error('leavetype')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="from_date">From Date</label>
                <input type="date" class="form-control @error('from_date') border border-danger @enderror" id="from_date" name="from_date"
                value="{{$user->from_date}}" disabled>
            
                @error('from_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="to_date">To Date</label>
                <input type="date" class="form-control @error('to_date') border border-danger @enderror" id="to_date" name="to_date"
                value="{{$user->to_date}}" disabled>
            
                @error('to_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                value="{{$user->description}}" disabled>

                @error('description')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status"
                value="{{$user->status}}" disabled >
            </div>

            <div class="form-group mb-3">
                <label for="numDays">Number of Days taken</label>
                <input type="text" class="form-control" id="numDays" name="numDays"
                value="{{$user->numDays}}" disabled >
            </div>

            <div class="form-group mb-3">
                <label for="adminRemarks">Admin Remarks</label>
                <input type="text" class="form-control" id="adminRemarks" name="adminRemarks" 
                value="{{$user->adminRemarks}}">
            </div>


            
            <button id="approve" name ="approve" type="submit" class="btn btn-primary"> Approve </button>
            <button id="decline" name ="decline" type="submit" class="btn btn-danger"> Decline </button>

           

        </form>

        </div>
    </div>
    </div>
@endsection