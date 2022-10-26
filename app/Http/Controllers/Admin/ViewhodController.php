<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class ViewhodController extends Controller
{
    public function index(Request $request){
        $email = $request->email;
        $users = DB::select('select * from users where role_as="2"');
        return view('admin.hod.viewhod',['users'=>$users]);
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.hod.edit', compact('user'));

    }
    public function update(Request $request, $id){
        
                $userr = User::find($id);
                $userr -> name = $request -> name;
                $userr -> email = $request -> email;
                $userr -> username = $request -> username;
                $userr -> department = $request -> department;
                $userr -> av_days = $request -> av_days;
                $userr -> role_as = $request -> role_as;
                $userr->save();

        return redirect('admin/viewhod')->with('status','HOD details edited successfully');
    }
}
