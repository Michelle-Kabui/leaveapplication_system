<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaveform;

class HodDashboardController extends Controller
{
    public function index(){

        // $users = User::where('role_as','0')->count;
        // $leaves = Leaveform::where('department',auth()->user()->department);
        // $pleaves = Leaveform::where('status','pending');

        return view('hod.dashboard');
    }
}
