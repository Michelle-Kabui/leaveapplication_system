<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use DB;

class DepartmentController extends Controller
{
    public function index(){
        $departments = DB::select('select * from departments');
        return view('admin.department.index', ['departments'=>$departments]);
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
    public function destroy($id){
        DB::delete('delete from departments where id = ?',[$id]);
        return redirect('admin/department')->with('status','Department deleted successfully');
    }

    public function edit($id){
        $department = Departments::find($id);
        return view('admin.department.edit', compact('department'));

    }
    public function update(Request $request, $id){
        
        $department = Departments::find($id);
        $department -> departmentname = $request -> departmentname;
        $department -> shortform = $request -> shortform;
        $department->save();

        return redirect('admin/department')->with('status','Department details edited successfully');
    }

}
