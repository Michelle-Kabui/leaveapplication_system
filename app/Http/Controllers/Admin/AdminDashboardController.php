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
        $managers = User::where('role_as','2')->count();
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
        return view('admin.dashboard', compact('users','aleaves','pleaves','rleaves','onleave','atwork','managers'), ['departments'=>$departments, 'usersArray'=>$usersArray, 'leaves'=>$leaves]);

>>>>>>> 1756efd7fd3f5c4ebbeb7f015f28f81726bd5b60
    }
}