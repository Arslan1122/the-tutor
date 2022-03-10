<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use App\Models\TuitionSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = TuitionSchedule::where('student_id', Auth::id())->get();
        return view('student.schedule.index',compact('schedules'));
    }
}
