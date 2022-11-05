<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaveform;

class HodDashboardController extends Controller
{
    public function index(){

        $users = User::where('role_as','0')->where('department',auth()->user()->department)->count(); 
        $leaves = Leaveform::where('department',auth()->user()->department)->count();
        $pleaves = Leaveform::where('status','pending')->where('department',auth()->user()->department)->count();
        $onleave = User::where('status','away')->where('department',auth()->user()->department)->count();
        $atwork = User::where('status','active')->where('department',auth()->user()->department)->count();

        return view('hod.dashboard',compact('users','onleave','atwork','pleaves'));
    }
}
 