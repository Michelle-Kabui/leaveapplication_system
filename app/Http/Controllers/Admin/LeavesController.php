<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaves;
use DB;

class LeavesController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('admin.leave.index');
    }
    public function create(){
        return view('admin.leave.create');
    }

    public function store(Request $request)
    {   
        $this -> validate($request, [
            'LeaveType'=> 'required|max:255',
            'Duration'=> 'required|max:255',
        ]);
        Leaves::create(
            [
                'LeaveType' => $request -> LeaveType,
                'Duration' => $request -> Duration,
            ]
        );
        return redirect('admin/add-leave')->with('status','Leave added successfully');     
    }

    public function rleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "rejected" ');
        return view('admin.leave.viewrleaves',['users'=>$users]);
        }

    public function pleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "pending" ');
        return view('admin.leave.viewpleaves',['users'=>$users]);
    }

    public function leaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms ');
        return view('admin.leave.viewleaves',['users'=>$users]);
    }

    public function aleaves(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where status = "approved" ');
        return view('admin.leave.viewaleaves',['users'=>$users]);
    }
}
