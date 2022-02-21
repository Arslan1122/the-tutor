<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\Tuition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionController extends Controller
{

    public function index()
    {
        $tuitions = Tuition::with(['standard', 'subject','course'])->orderBy('id','desc')->get();
        $standards = Standard::orderBy('name','asc')->get();
        $subjects = Subject::orderBy('name','asc')->get();
        $courses = Course::orderBy('name','asc')->get();
        return view('student.tuitions.index', compact('tuitions', 'standards','subjects','courses'));
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
