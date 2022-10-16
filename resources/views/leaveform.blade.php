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
                <label for="leavetype">Leave Type</label>
                <select name="leavetype" id="leavetype" class="form-control @error('username') border border-danger @enderror">
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Maternity Leave">Maternity Leave</option>
                    <option value="Paternity Leave">Paternity Leave</option>
                    <option value="Compensatory Leave">Compensatory Leave</option>
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
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status"
                value="pending" >
            </div>


            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

    </div>
@endsection