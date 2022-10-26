<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HodDashboardController extends Controller
{
    public function index(){

        return view('hod.dashboard');
    }
}
