<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LeaveformController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\LeavesController;


Route::get('/',function(){
    return view('home');
})->name('home');


Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
->name('dashboard')
;

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@store');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@store');

Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController@store')->name('logout');

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::post('/posts', 'App\Http\Controllers\PostController@store');

Route::get('/leaveform', 'App\Http\Controllers\LeaveformController@index')->name('leaveform');
Route::post('/leaveform', 'App\Http\Controllers\LeaveformController@store');

Route::get('/viewhistory', 'App\Http\Controllers\ViewhistoryController@index')->name('viewhistory');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard', ('App\Http\Controllers\Admin\AdminDashboardController@index') );

    Route::get('/department', ('App\Http\Controllers\Admin\DepartmentController@index') ); //view company departments
    Route::get('/add-department', ('App\Http\Controllers\Admin\DepartmentController@create'));
    Route::post('/add-department', ('App\Http\Controllers\Admin\DepartmentController@store'));

    Route::get('/add-leave', ('App\Http\Controllers\Admin\LeavesController@create'));
    Route::post('/add-leave', ('App\Http\Controllers\Admin\LeavesController@store'));
    Route::get('/leave', ('App\Http\Controllers\Admin\LeavesController@index') ); // view leave categories
    Route::get('/viewleaves', 'App\Http\Controllers\Admin\LeavesController@leaves'); //view all leaves
    Route::get('/viewpleaves', 'App\Http\Controllers\Admin\LeavesController@pleaves'); //view pending leaves only
    Route::get('/viewaleaves', 'App\Http\Controllers\Admin\LeavesController@aleaves'); //view approved leaves only
    Route::get('/viewrleaves', 'App\Http\Controllers\Admin\LeavesController@rleaves'); //view rejected leaves only

    Route::get('/viewhod', 'App\Http\Controllers\Admin\ViewhodController@index'); // View hod's only
    Route::get('/edit-hod/{id}', 'App\Http\Controllers\Admin\ViewhodController@edit'); // Edit Staff member details
    Route::put('/update-hod/{id}', 'App\Http\Controllers\Admin\ViewhodController@update'); // Update member details

    Route::get('/viewusers', 'App\Http\Controllers\Admin\ViewusersController@index'); //View staff members only
    Route::get('/edit-user/{id}', 'App\Http\Controllers\Admin\ViewusersController@edit'); // Edit Staff member details
    Route::put('/update-user/{id}', 'App\Http\Controllers\Admin\ViewusersController@update'); // Update member details

});

Route::prefix('hod')->middleware(['auth','isHod'])->group(function(){

    Route::get('/dashboard', ('App\Http\Controllers\Hod\HodDashboardController@index') );

    Route::get('/viewusers', 'App\Http\Controllers\Hod\ViewusersController@index'); //View staff members only
    Route::get('/edit-user/{id}', 'App\Http\Controllers\Hod\ViewusersController@edit'); // Edit Staff member details
    Route::put('/update-user/{id}', 'App\Http\Controllers\Hod\ViewusersController@update'); // Update member details

    Route::get('/viewleaves', 'App\Http\Controllers\Hod\LeavesController@leaves'); //view all leaves
    Route::get('/viewpleaves', 'App\Http\Controllers\Hod\LeavesController@pleaves'); //view pending leaves only
    Route::get('/viewaleaves', 'App\Http\Controllers\Hod\LeavesController@aleaves'); //view approved leaves only
    Route::get('/viewrleaves', 'App\Http\Controllers\Hod\LeavesController@rleaves'); //view rejected leaves only

    Route::get('/manage-leave/{id}','App\Http\Controllers\Hod\LeavesController@edit'); //manage leave
    Route::put('/approve-leave/{id}','App\Http\Controllers\Hod\LeavesController@approve');
    Route::put('/decline-leave/{id}','App\Http\Controllers\Hod\LeavesController@decline');
    Route::put('/update-leave/{id}','App\Http\Controllers\Hod\LeavesController@update');
});