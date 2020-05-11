<?php

namespace App\Http\Controllers;

use App\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::with('department')->latest()->paginate(); //paginate default 15 per page

        return view('faculty.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('faculty.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'department_id' => 'required',
            'education' => 'required',
        ]);

        $created = Faculty::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'phone' => $request->phone,
           'email' => $request->email,
           'department_id' => $request->department_id,
            'education' => $request->education
        ]);

        if ($created){
            return redirect()->route('faculties.index')->with('status','New Faculty Member added  successfully');
        }

        return redirect()->back()->with('status', 'Whoops! someting went wrong!');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //$data = Faculty::findOrFail($faculty); // here use findor fail becouse of if faculty id not found got the error 404
        $departments = Department::all();

        return view('faculty.edit', compact('faculty','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'department_id' => 'required',
            'education' => 'required',
        ]);

        $faculty = Faculty::find($id);
        $faculty->first_name = $request->first_name;
        $faculty->last_name = $request->last_name;
        $faculty->phone = $request->phone;
        $faculty->email = $request->email;
        $faculty->department_id = $request->department_id;
        $faculty->education = $request->education;

        if ($faculty->save()){
            return redirect()->back()->with('status','Faculty info updated');
        }

        return redirect()->back()->with('status','Whoops field!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $deleted = $faculty->delete();

        if ($deleted){
            return redirect()->back()->with('status','Deleted successfully');
        }
        return redirect()->back()->with('status','Whoops! Delete Fail!');
    }
}
