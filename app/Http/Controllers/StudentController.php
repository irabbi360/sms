<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Department;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $datas = Student::all();

        return view('student.index',compact('datas'));
    }

    public function create()
    {
        $departments = Department::all();
        $classes = Classes::all();

        return view('student.create',compact('departments','classes'));
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        Student::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'roll' => $request->roll,
            'reg_id' => $request->reg_id,
            'department_id' => $request->department_id,
            'classes_id' => $request->classes_id,
            'mother_name' => $request->mother_name,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'title' => $request->title,
            'home_number' => $request->home_number,
        ]);

        return redirect()->back()->with('status','Student successfully saved');

    }

    public function edit($id)
    {
        $data = Student::find($id);
        $departments = Department::all();
        $classes = Classes::all();

        return view('student.edit',compact('data','departments','classes'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = Student::find($id);

        $data->update($request->all());

        return redirect()->back()->with('status','Student successfully updated');
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();

        return redirect()->back()->with('status','Student record deleted');
    }
}
