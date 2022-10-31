<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaves;
use DB;
use App\Models\Leaveform;
use DateTime;
use App\Models\User;

class LeavesController extends Controller
{
    public function rleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "rejected" and department = "'.auth()->user()->department.'" '); // add department to leaveforms and its table
        return view('hod.leave.viewrleaves',['users'=>$users]);
        }

    public function pleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "pending" and department = "'.auth()->user()->department.'" ');
        return view('hod.leave.viewpleaves',['users'=>$users]);
    }

    public function leaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where department = "'.auth()->user()->department.'" ');
        return view('hod.leave.viewleaves',['users'=>$users]);
    }

    public function aleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "approved" and department = "'.auth()->user()->department.'" ');
        return view('hod.leave.viewaleaves',['users'=>$users]);
    }

    public function edit($id){
        $user = Leaveform::find($id);
        return view('hod.leave.edit', compact('user'));

    }

    public function update(Request $request, $id){

        // $start_date;
        // $end_date;

        // $available_days = auth()->user()->av_days;
        // $days_left = $available_days-$dayss;

        if(isset($_POST['approve'])){
            $leave = Leaveform::find($id);

            //select from_date and to_date
            $from_date = Leaveform::find($id)->from_date;
            $to_date = Leaveform::find($id)->to_date;

            $start_date = strtotime($from_date);
            $end_date = strtotime($to_date);

            //find available days
            $av_days = DB::table('users')->where('email', '=', Leaveform::find($id)->email)->value('av_days');

            //find date diff
            $dayss = intval(($end_date - $start_date)/60/60/24);

            //available days after approving leave
            $days_left = $av_days-$dayss;
            
            //update db
            DB::table('users')
                    ->where('email', Leaveform::find($id)->email)
                    ->update(['av_days' => $days_left]);

            DB::table('users')
                    ->where('email', Leaveform::find($id)->email)
                    ->update(['status' => "away"]);

            //approving
            $leave -> status = "approved"; //Approved
            $leave -> adminRemarks = $request -> adminRemarks;
            $leave->save();

            return redirect('hod/viewpleaves')->with('status','Leave Approved Successfully');
        }
        else{
            $leave = Leaveform::find($id);
            $leave -> status = "rejected"; //Declined
            $leave -> adminRemarks = $request -> adminRemarks;
            $leave->save();
            return redirect('hod/viewpleaves')->with('status','Leave Declined Successfully');
        }
    }

}
