<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaveform;
class AdminDashboardController extends Controller
{
    public function index(){
        $users = User::where('role_as','0')->count();
        $usersArray = DB::table('users')->get(); 
        $leaves = DB::table('leaveforms')->get();
        $aleaves = Leaveform::where('status','approved')->count();
        $pleaves = Leaveform::where('status','pending')->count();
        $rleaves = Leaveform::where('status','rejected')->count();
        $onleave = User::where('status','away')->count();
        $atwork = User::where('status','active')->count();
        $departments = DB::select('select * from departments');


<<<<<<< HEAD

        return view('admin.dashboard', compact('users','aleaves','pleaves','rleaves','onleave','atwork'), ['departments'=>$departments, 'usersArray'=>$usersArray, 'leaves'=>$leaves]);
=======
        return view('admin.dashboard', compact('users','aleaves','pleaves','rleaves','onleave','atwork'));
>>>>>>> c4a03b768f7dbf297d6279655356ee7a95fcf70b
    }
}