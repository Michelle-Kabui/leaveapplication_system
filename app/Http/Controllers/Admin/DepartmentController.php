<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentController extends Controller
{
    public function index(){
        return view('admin.department.index');
    }
    public function create(){
        return view('admin.department.create');
    }
    public function store(Request $request)
    {
        
        $this -> validate($request, [
            'departmentname'=> 'required|max:255',
            'shortform'=> 'required|max:255',

        ]);

        Departments::create(
            [
                'departmentname' => $request -> departmentname,
                'shortform' => $request -> shortform,
            ]
        );

        return redirect('admin/add-department')->with('status','Department added successfully');
        
        
        
    }

}
