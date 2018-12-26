<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $datas = Classes::all();

        return view('class.index',compact('datas'));
    }

    public function create()
    {
        return view('class.create');
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
            ]);

        Classes::create([
            'title' => $request->title
        ]);

        return redirect()->back()->with('status','Class successfully saved');

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
