<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $daystaken = (30-auth()->user()->av_days);

        return view('dashboard', compact('daystaken'));
    }
}
