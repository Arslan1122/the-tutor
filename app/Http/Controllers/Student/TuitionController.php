<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionController extends Controller
{

    public function index()
    {
        $tuitions = Tuition::orderBy('id','desc')->get();
        return view('student.tuitions.index', compact('tuitions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $request['user_id'] = Auth::id();
        Tuition::create($request->all());
        return redirect()->back()->with('success', 'Tuition Added Successfully !');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $tuition = Tuition::find($id);
        $request['user_id'] = Auth::id();
        $tuition->update($request->except('_token'));

        return redirect()->back()->with('success', 'Tuition Updated Successfully !');
    }


    public function destroy($id)
    {
        Tuition::find($id)->delete();
        return redirect()->back()->with('success', 'Tuition Deleted Successfully !');
    }
}
