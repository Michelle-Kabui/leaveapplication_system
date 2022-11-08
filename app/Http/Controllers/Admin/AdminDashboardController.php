<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaveform;
class AdminDashboardController extends Controller
{
    public function index(){
        $users = User::where('role_as','0')->count(); 
        $aleaves = Leaveform::where('status','approved')->count();
        $pleaves = Leaveform::where('status','pending')->count();
        $rleaves = Leaveform::where('status','rejected')->count();
        $onleave = User::where('status','away')->count();
        $atwork = User::where('status','active')->count();


        return view('admin.dashboard', compact('users','aleaves','pleaves','rleaves','onleave','atwork'));
    }
}
