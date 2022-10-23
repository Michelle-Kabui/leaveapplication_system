<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        
        $this->middleware(['guest']);
    }

    public function index(){
        
        return view('auth.login');
    }

    public function store(Request $request){

        $this -> validate($request, [
            'email'=> 'required',
            'password'=> 'required',
        ]);

        if (auth() -> attempt($request -> only('email', 'password'), $request->remember )){
            //directs user to dashboard
            //return redirect()->route('dashboard');
            if(Auth::user()->role_as == '1') // admin -> 1
        {
            return redirect('admin/dashboard')->with('status','Welcome back');
        }
        else if(Auth::user()->role_as == '0'){
            return redirect('/dashboard')->with('status','Login Successful');
        }
        else{
            return redirect('/');
        }
        }
        else{
            return back()-> with('status', 'Invalid login details');
        }
    }
    // public function authenticated(){
    //     if(Auth::user()->role_as == '1') // admin -> 1
    //     {
    //         return redirect('admin/dashboard')->with('status','Welcome back');
    //     }
    //     else if(Auth::user()->role_as == '0'){
    //         return redirect('/dashboard')->with('status','Login Successful');
    //     }
    //     else{
    //         return redirect('/');
    //     }
    // }
}
