<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function edit($id)
    {
        $teacher = User::with(['teacherProfile', 'standards.standard' ,'courses.course', 'subjects.subject'])->find($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->courses()->delete();
        $user->subjects()->delete();
        $user->standards()->delete();
        $user->teacherProfile()->delete();
        $user->delete();
        return redirect()->route('admin.un.approved.teachers')->with('success','Teacher Deleted Successfully !');
    }

    public function approvedTeachers()
    {
        $teachers = User::role('teacher')->with('teacherProfile')->where('is_approved', 1)->where('is_block', 0)->orderBy('id','desc')->get();
        return view('admin.teacher.approved', compact('teachers'));
    }

    public function unApprovedTeachers()
    {
        $teachers = User::role('teacher')->with('teacherProfile')->where('is_approved', 0)->where('is_block', 0)->orderBy('id','desc')->get();
        return view('admin.teacher.unapproved', compact('teachers'));

    }

    public function blockedTeachers()
    {
        $teachers = User::role('teacher')->with('teacherProfile')->where('is_block', 1)->orderBy('id','desc')->get();
        return view('admin.teacher.blocked', compact('teachers'));
    }

    public function changeStatus($id, $status)
    {
        if($status == 1) {
            $user = User::find($id);
            $user->update([
                'is_approved' => 1,
            ]);

            $user->teacherProfile->update(['is_complete' => 1]);

            return redirect()->route('admin.un.approved.teachers')->with('success', 'Teacher Approved Successfully !');

        } else {
            $user = User::find($id);
            $user->update([
                'is_approved' => 0,
            ]);
            $user->teacherProfile->update(['is_complete' => 0]);

            return redirect()->route('admin.approved.teachers')->with('success', 'Teacher Un Approved Successfully !');
        }
    }

    public function changeBlockStatus($id, $status)
    {
        if($status == 1) {
            $user = User::find($id);
            $user->update([
                'is_block' => 1,
            ]);
            return redirect()->route('admin.approved.teachers')->with('success', 'Teacher Blocked Successfully !');
        }
        else {
            $user = User::find($id);
            $user->update([
                'is_block' => 0,
            ]);
            return redirect()->route('admin.blocked.teachers')->with('success', 'Teacher Un Blocked Successfully !');
        }
    }
}
