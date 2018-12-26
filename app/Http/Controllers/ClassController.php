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

    public function edit($id)
    {
        $data = Classes::find($id);

        return view('class.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $data = Classes::find($id);

        $data->title = $request->title;

        $data->save();

        return redirect()->back()->with('status','Class successfully updated');
    }

    public function delete($id)
    {
        $data = Classes::find($id);
        $data->delete();

        return redirect()->back()->with('status','Class record deleted');
    }
}
