<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use App\Models\TuitionProposal;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserStandard;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionController extends Controller
{
    public function index()
    {
        $teacherStandard = UserStandard::where('user_id',Auth::id())->pluck('standard_id')->toArray();
        $teacherCourses = UserCourse::where('user_id',Auth::id())->pluck('course_id')->toArray();
        $teacherSubjects = UserSubject::where('user_id', Auth::id())->pluck('subject_id')->toArray();
        $Alltuitions = Tuition::where('is_approved', 1)->get();
        $tuitions= [];
        foreach ($Alltuitions as $tuition)
        {
            if(
                in_array($tuition->standard_id, $teacherStandard) ||
                in_array($tuition->course_id, $teacherCourses) ||
                in_array($tuition->subject_id , $teacherSubjects)
            ) {
                $tuitions[] = $tuition;
            }
        }

        return view('teacher.tuitions.index',compact('tuitions'));
    }

    public function show($id)
    {
        $tuition = Tuition::where('id',$id)->with(['user','subject','course', 'standard'])->first();
        return view('teacher.tuitions.detail', compact('tuition'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->no_of_bids == 0)
        {
            return redirect()->back()->with('error', "You donot have enough bids! Subscribe to one our plan.");
        }
        $request['teacher_id'] = Auth::id();
        $proposal = TuitionProposal::create($request->all());
        if($proposal) {
            $teacher = User::find(Auth::id());
            $teacher->no_of_bids = $teacher->no_of_bids - 1;
            $teacher->save();

        }
        return redirect()->back()->with('success', "Bid Submitted Successfully!");
    }

    public function bids()
    {
        $bids = TuitionProposal::where('teacher_id', Auth::id())->with('tuition')->get();
        return view('teacher.tuitions.bids', compact('bids'));
    }
}
