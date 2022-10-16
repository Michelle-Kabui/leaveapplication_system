<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ViewhistoryController extends Controller
{
    public function index(Request $request){
        $email = $request->email;
        $users = DB::select('select * from leaveforms where email = "'.auth()->user()->email.'" ');
        return view('viewhistory',['users'=>$users]);
        }
}