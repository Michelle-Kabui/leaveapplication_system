<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaveform;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(Request $request){
        $daystaken = (30-auth()->user()->av_days);

        $end_date = DB::table('leaveforms')->where('email', '=', auth()->user()->email)->value('to_date');
        $current_date = date('Y-m-d');

        if($current_date == strtotime($end_date)){
            DB::table('users')
                ->where('email', Leaveform::find($email)->email)
                ->update(['status' => "active"]);
        }
    
        return view('dashboard', compact('daystaken'));
    }

    public function privacy(){
        return view('privacy');
    }

    public function terms(){
        return view('terms');
    }
}
