@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Add Department</h4>
        </div>
        <div class="card-body">
            <div class="text-success">
                @if (session('status'))
                {{ session('status') }}
            @endif
            </div>
            

        <form action="{{url('admin/update-department/'.$department->id)}}" method="post">
            {{ csrf_field() }}
            @method('PUT')

            <div class="form-group mb-3">
                <label for="departmentname">Department Name</label>
                <input type="text" value="{{$department->departmentname}}" class="form-control @error('departmentname') border border-danger @enderror" id="departmentname" name="departmentname">
            
                @error('departmentname')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="shortform">Short Form</label>
                <input type="text" value="{{$department->shortform}}" class="form-control @error('shortform') border border-danger @enderror" id="shortform" name="shortform">
            
                @error('shortform')
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