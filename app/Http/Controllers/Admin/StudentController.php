<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class StudentController extends Controller
{
    public function edit($id)
    {
        $student = User::with(['studentProfile', 'standards.standard' ,'courses.course', 'subjects.subject'])->find($id);
        return view('admin.student.edit', compact('student'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->courses()->delete();
        $user->subjects()->delete();
        $user->standards()->delete();
        $user->studentProfile()->delete();
        $user->delete();
        return redirect()->route('admin.un.approved.students')->with('success','Student Deleted Successfully !');
    }

    public function approvedStudents()
    {
        $students = User::role('student')->with('studentProfile')->where('is_approved', 1)->where('is_block', 0)->orderBy('id','desc')->get();
        return view('admin.student.approved', compact('students'));
    }

    public function unApprovedStudents()
    {
        $students = User::role('student')->with('studentProfile')->where('is_approved', 0)->where('is_block', 0)->orderBy('id','desc')->get();
        return view('admin.student.unapproved', compact('students'));

    }

    public function blockedStudents()
    {
        $students = User::role('student')->with('studentProfile')->where('is_block', 1)->orderBy('id','desc')->get();
        return view('admin.student.blocked', compact('students'));
    }

    public function changeStatus($id, $status)
    {
        if($status == 1) {
            $user = User::find($id);
            $user->update([
                'is_approved' => 1,
            ]);

            $user->studentProfile->update(['is_complete' => 1]);

            return redirect()->route('admin.un.approved.students')->with('success', 'Student Approved Successfully !');

        } else {
            $user = User::find($id);
            $user->update([
                'is_approved' => 0,
            ]);
            $user->studentProfile->update(['is_complete' => 0]);

            return redirect()->route('admin.approved.students')->with('success', 'Student Un Approved Successfully !');
        }
    }

    public function changeBlockStatus($id, $status)
    {
        if($status == 1) {
            $user = User::find($id);
            $user->update([
                'is_block' => 1,
            ]);
            return redirect()->route('admin.approved.students')->with('success', 'Student Blocked Successfully !');
        }
        else {
            $user = User::find($id);
            $user->update([
                'is_block' => 0,
            ]);
            return redirect()->route('admin.blocked.students')->with('success', 'Student Un Blocked Successfully !');
        }
    }
}
