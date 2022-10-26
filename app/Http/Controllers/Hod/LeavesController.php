<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaves;
use DB;

class LeavesController extends Controller
{
    public function rleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "rejected" '); // add department to leaveforms and its table
        return view('hod.leave.viewrleaves',['users'=>$users]);
        }

    public function pleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "pending" ');
        return view('hod.leave.viewpleaves',['users'=>$users]);
    }

    public function leaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms ');
        return view('hod.leave.viewleaves',['users'=>$users]);
    }

    public function aleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "approved" ');
        return view('hod.leave.viewaleaves',['users'=>$users]);
    }
}
