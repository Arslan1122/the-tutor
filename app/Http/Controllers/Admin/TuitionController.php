<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tuition;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    public function index()
    {
        $tuitions = Tuition::orderBy('id','desc')->get();
        return view('admin.tuitions.index', compact('tuitions'));
    }

    public function approvedTuitions()
    {
        $tuitions = Tuition::where('is_approved', 1)->orderBy('id','desc')->get();
        return view('admin.tuitions.approved', compact('tuitions'));
    }

    public function unApprovedTuitions()
    {
        $tuitions = Tuition::where('is_approved', 0)->orderBy('id','desc')->get();
        return view('admin.tuitions.unapproved', compact('tuitions'));
    }

    public function approve($id)
    {
        Tuition::find($id)->update([
            'is_approved' => 1
        ]);
        return redirect()->back()->with('success', 'Tuition Request Approved Successfully!');
    }

    public function unapprove($id)
    {
        Tuition::find($id)->update([
            'is_approved' => 0
        ]);
        return redirect()->back()->with('success', 'Tuition Request UnApproved Successfully!');
    }
}
