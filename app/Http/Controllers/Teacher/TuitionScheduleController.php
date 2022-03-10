<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use App\Models\TuitionProposal;
use App\Models\TuitionSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionScheduleController extends Controller
{
    public function index()
    {
        $schedules = TuitionSchedule::with('tuition')->where('teacher_id', Auth::id())->get();
        return view('teacher.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $tuitions = TuitionProposal::where('teacher_id', Auth::id())->where('is_accepted', 1)->with('tuition')->get();
        return view('teacher.schedule.create', compact('tuitions'));
    }

    public function store(Request $request)
    {
        $tuition = Tuition::find($request->tuition_id);
        $date = Carbon::createFromFormat('m/d/Y', $request->class_date);
        TuitionSchedule::create([
            'tuition_id' => $request->tuition_id,
            'teacher_id' => Auth::id(),
            'student_id' => $tuition->user_id,
            'class_date' => $date,
            'class_time' => $request->class_time,
            'meet_link'  => $request->meet_link
        ]);
        return redirect()->route('teacher.schedule.index')->with('success', 'Schedule created successfully !');
    }

    public function destroy($id)
    {
        TuitionSchedule::find($id)->delete();
        return redirect()->back()->with('success','Schedule Deleted Successfully !');
    }
}
