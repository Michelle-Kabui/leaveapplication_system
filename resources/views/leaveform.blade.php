@extends('layouts.app')

@section('content')

    <?php
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
    $next_date = date('Y-m-d', strtotime($date .' +1 day'));
    

    ?>
    
    <div class="p-3">
        <h1>LEAVE FORM</h1>
        <div class="fw-light text-danger">
            @if (session('status'))
            {{ session('status') }}
        @endif
        </div>
        
        <form action="{{route('leaveform')}}" method="post">
            {{ csrf_field() }} 
            <div class="form-group mb-3">
                <label for="email" hidden>Email</label>
                <input type="text" class="form-control  @error('email') border border-danger @enderror" id="email" name="email"
                value="{{ auth()->user()->email }}" hidden >

                @error('email')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="department" hidden>Department</label>
                <input type="text" class="form-control" id="department" name="department"
                value="{{ auth()->user()->department }}" hidden >
            </div>

            <div class="form-group mb-3">
                <label for="leavetype">Leave Type</label>
                <select name="leavetype" id="leavetype">
                    @foreach ($leaves as $leave)
                        <option value="{{$leave->LeaveType}}">{{$leave->LeaveType}}</option>
                    @endforeach
                </select>
              
                @error('leavetype')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="from_date">From Date</label>
                <input type="date" class="form-control @error('from_date') border border-danger @enderror" id="from_date" name="from_date">
            
                @error('from_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="to_date">To Date</label>
                <input type="date" class="form-control @error('to_date') border border-danger @enderror" id="to_date" name="to_date">
            
                @error('to_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class=" p-4 bg-info bg-opacity-10 form-control @error('description') border border-danger @enderror"
                placeholder="Reason for leave... "></textarea>

                @error('description')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="status" hidden>Status</label>
                <input type="text" class="form-control" id="status" name="status"
                value="pending" hidden>
            </div>


            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

    </div>
@endsection