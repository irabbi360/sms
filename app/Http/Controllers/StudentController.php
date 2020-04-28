<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Department;
use App\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'image' => 'required',
        ]);

        /*$student = new Student();
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->phone_number = $request->phone_number;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->reg_id = $request->reg_id;
        $student->department_id = $request->department_id;
        $student->classes_id = $request->classes_id;
        $student->mother_name = $request->mother_name;
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->title = $request->title;
        $student->home_number = $request->home_number;*/
        $stdImage ='';
        if ($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students/' . $filename));
            $stdImage = $filename;
        }

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
            //'title' => $request->title,
            'home_number' => $request->home_number,
            'image' => $stdImage,
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

        $stdImage ='';
        if ($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students/' . $filename));
            $stdImage = $filename;
        }

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->phone_number = $request->phone_number;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->reg_id = $request->reg_id;
        $student->department_id = $request->department_id;
        $student->classes_id = $request->classes_id;
        $student->mother_name = $request->mother_name;
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->home_number = $request->home_number;
        $student->image = $stdImage;

        if ($student->save()){
            return redirect()->back()->with('status','Student successfully updated');
        }
        return redirect()->back()->with('status','Fail Student info update');
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();

        return redirect()->back()->with('status','Student record deleted');
    }
}
