<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $tuitions = Tuition::with(['standard', 'subject','course'])->orderBy('id','desc')->get();

        $completedTuitions = Tuition::where('user_id',Auth::id())
            ->where('is_completed', 1)
            ->whereHas('isAcceptedproposals')->with('isAcceptedproposals.teacher')->get();

        $activeTuitions = Tuition::where('user_id',Auth::id())
            ->where('is_completed', 0)
            ->whereHas('isAcceptedproposals')->with('isAcceptedproposals.teacher')->get();

        return view('student.index', compact('completedTuitions','activeTuitions','tuitions'));
    }
}
