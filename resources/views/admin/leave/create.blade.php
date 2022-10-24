@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Add New Leave Type</h4>
        </div>
        <div class="card-body">
        <div class="text-success">
                @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

        <form action="{{url('admin/add-leave')}}" method="post">
            {{ csrf_field() }} 

            <div class="form-group mb-3">
                <label for="LeaveType">Leave Type</label>
                <input type="text" class="form-control @error('LeaveType') border border-danger @enderror" id="LeaveType" name="LeaveType">
            
                @error('LeaveType')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="Duration">Max Duration</label>
                <input type="number" class="form-control @error('Duration') border border-danger @enderror" id="Duration" name="Duration">
            
                @error('Duration')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

        </div>
    </div>
</div>

@endsection