<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ViewhodController extends Controller
{
    public function index(Request $request){
        $email = $request->email;
        $users = DB::select('select * from users where role_as="2"');
        return view('admin.hod.viewhod',['users'=>$users]);
        }
}
