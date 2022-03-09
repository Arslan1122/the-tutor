<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Job;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\Tuition;
use App\Models\TuitionProposal;
use App\Models\TuitionRating;
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

    public function proposals($id)
    {
        $tuition = Tuition::with(['subject','standard', 'course','isAcceptedproposals'])->find($id);
        $proposals = TuitionProposal::where('tuition_id', $id)->with(['tuition','teacher'])->get();
        return view('student.tuitions.proposals', compact('proposals','tuition'));
    }

    public function hireTeacher($id)
    {
        $proposal = TuitionProposal::with(['tuition','teacher'])->find($id);
        $proposal->update([
            'is_accepted' => 1
        ]);

        Job::create([
            'tuition_proposal_id' => $proposal->id,
            'user_id' => $proposal->tuition->user_id,
            'teacher_id' => $proposal->teacher_id
        ]);
        return redirect()->back()->with('success', 'Your Tuition Started Successfully !');
    }

    public function completedTuitions()
    {
        $tuitions = Tuition::where('user_id',Auth::id())
            ->where('is_completed', 1)
            ->whereHas('isAcceptedproposals')->with('isAcceptedproposals.teacher')->get();
        return view('student.tuitions.my-tuitions', compact('tuitions'));
    }

    public function activeTuitions()
    {
        $tuitions = Tuition::where('user_id',Auth::id())
            ->where('is_completed', 0)
            ->whereHas('isAcceptedproposals')->with('isAcceptedproposals.teacher')->get();
        return view('student.tuitions.my-tuitions', compact('tuitions'));
    }

    public function activeTuitionDetail($id)
    {
        $tuition = Tuition::with(['isAcceptedproposals'])->find($id);
        $proposals = TuitionProposal::where(['tuition_id' => $id, 'is_accepted' => 1])->with(['tuition','teacher'])->get();
        $review = TuitionRating::where('tuition_id', $tuition->id)->first();
        return view('student.tuitions.active-tuition-detail', compact('tuition','proposals','review'));
    }

    public function completeTuition(Request  $request)
    {
        $tuition = Tuition::find($request->id);
        $tuition->update(['is_completed' => 1]);
        $tuition->isAcceptedproposals()->update(['is_completed' => 1]);
        TuitionRating::create([
            'user_id' => Auth::id(),
            'teacher_id' => $request->teacherId,
            'tuition_id' => $request->id,
            'rating' => $request->rating,
            'review' => $request->review
        ]);
        return redirect()->back()->with('success','review given successfully !');
    }
}
