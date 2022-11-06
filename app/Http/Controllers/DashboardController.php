<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaveform;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $daystaken = (30-auth()->user()->av_days);

        $email = auth()->user()->email;
        $end_date = strtotime(Leaveform::find($email)->to_date);
        $current_date = date('Y-m-d');

        if($current_date == $end_date){
            DB::table('users')
                ->where('email', Leaveform::find($email)->email)
                ->update(['status' => "active"]);
        }
    
        return view('dashboard', compact('daystaken'));
    }
}
