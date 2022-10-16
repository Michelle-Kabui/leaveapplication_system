<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;

class LeaveformController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('leaveform');
    }

    public function store(Request $request)
    {
                //Declare two dates
                $start_date = strtotime($request->from_date);
                $end_date = strtotime($request->to_date);
                
                // Get the difference and divide into
                // total no. seconds 60/60/24 to get
                // number of days
                $dayss = intval(($end_date - $start_date)/60/60/24);


                $date = date('Y-m-d');
                $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
                $next_date = date('Y-m-d', strtotime($date .' +1 day'));

                if(($request->from_date)<$date || ($request->to_date)<$date || ($request->to_date)<($request->from_date)){
                    return back()-> with('status', 'Please select valid dates');
                    
                }

        
        $this -> validate($request, [
            'email'=> 'required|max:255',
            'leavetype'=> 'required|max:255',
            'to_date'=> 'required|max:255',
            'from_date'=> 'required|max:255',
            'description'=> 'required|max:255',
            'status'=> 'required|max:255',

        ]);

        $request->user()->leaveform()->create(
            [
                'email' => $request -> email,
                'leavetype' => $request-> leavetype,
                'to_date' => $request-> to_date,
                'from_date' => $request-> from_date,
                'description' => $request -> description,
                'status' => $request -> status,
                'numDays' => $dayss,

                
            ]
        );

        return redirect()->route('dashboard');
        
        
        
    }
}
