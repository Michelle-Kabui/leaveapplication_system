<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if(Auth::user()->role_as == '1') // admin -> 1
        {
            return view('admin.profile');
        }
        else if(Auth::user()->role_as == '2'){
            return view('hod.profile');
        }
        else if(Auth::user()->role_as == '0'){
            return view('profile');
        }
        //return view('profile');
    }
    public function update(Request $request){
        
        $userr = User::find(auth()->user()->id);
        $userr -> tnumber = $request -> tnumber;
        $userr -> address = $request -> address;
        $userr -> gender = $request -> gender;
        $userr -> nationality = $request -> nationality;
        $userr -> IDno = $request -> IDno;
        $userr -> ename = $request -> ename;
        $userr -> etnumber = $request -> etnumber;

        if($request->hasfile('picture')){

            $file = $request->file('picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/users/',$filename);
            $userr->picture = $filename;
        }


        $userr->save();

        return redirect('profile')->with('status','User details edited successfully');
    }
    public function passwordCreate(){
        if(Auth::user()->role_as == '1') // admin -> 1
        {
            return view('admin.change-password');
        }
        else if(Auth::user()->role_as == '2'){
            return view('hod.change-password');
        }
        else if(Auth::user()->role_as == '0'){
            return view('change-password');
        }

        //return view('change-password');
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            if(Auth::user()->role_as == '1') // admin -> 1
            {
                return redirect('admin/dashboard')->with('message','Password Updated Successfully');
            }
            else if(Auth::user()->role_as == '2'){
                return redirect('hod/dashboard')->with('message','Password Updated Successfully');
            }
            else if(Auth::user()->role_as == '0'){
                return redirect('/dashboard')->with('message','Password Updated Successfully');
            }

            //return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    
    }
}
