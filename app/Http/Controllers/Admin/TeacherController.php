<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::with(['teacherProfile', 'standards.standard' ,'courses.course', 'subjects.subject'])->find($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $teachers = User::role('teacher')->with('teacherProfile')->where('is_approved', 1)->orderBy('id','desc')->get();
        return view('admin.teacher.approved', compact('teachers'));
    }

    public function unApprovedTeachers()
    {
        $teachers = User::role('teacher')->with('teacherProfile')->where('is_approved', 0)->orderBy('id','desc')->get();
        return view('admin.teacher.unapproved', compact('teachers'));

    }

    public function changeStatus($id, $status)
    {
        if($status == 1) {
            $user = User::find($id)->update([
                'is_approved' => 1,
            ]);

            $user->teacherProfile->update(['is_complete' => 1]);

            return redirect()->back()->with('success', 'Teacher Approved Successfully !');

        } else {
            $user = User::find($id)->update([
                'is_approved' => 0,
            ]);
            $user->teacherProfile->update(['is_complete' => 0]);

            return redirect()->back()->with('success', 'Teacher Blocked Successfully !');
        }
    }
}
