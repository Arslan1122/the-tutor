<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Http\Requests\Student\ProfileRequest;
use App\Models\Course;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\Teacher\Profile;
use App\Models\TeacherProfile;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserStandard;
use App\Models\UserSubject;
use App\Services\CrudService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $crudService;
    protected $profileService;

    public function __construct(CrudService $crudService,ProfileService $profileService){
        $this->crudService=$crudService;
        $this->profileService=$profileService;
    }

    public function display(){
        $teacher = User::with(['teacherProfile', 'standards'])->find(Auth::id());
        dd($teacher);
        return view('teacher.profile.index',compact('teacher'));
    }

    public function edit(){

        $profile=TeacherProfile::with('user')->where('user_id',Auth::id())->first();
        $standards = Standard::orderBy('name','asc')->get();
        $courses = Course::orderBy('name','asc')->get();
        $subjects = Subject::orderBy('name','asc')->get();
        $userStandards = UserStandard::where('user_id', Auth::id())->get()->pluck('standard_id')->toArray();
        $userCourses = UserCourse::where('user_id', Auth::id())->get()->pluck('course_id')->toArray();
        $userSubjects = UserSubject::where('user_id', Auth::id())->get()->pluck('subject_id')->toArray();

        return view('teacher.profile.edit',
            compact('profile','standards','courses','subjects','userStandards','userCourses','userSubjects'));
    }
    public function update(ProfileRequest $request,$id)
    {
        $studentProfile=$this->profileService->updateOrCreate($id,$request,'TeacherProfile');

        if(json_decode($studentProfile->getcontent())->flag){
            return redirect()->back()->with('success', 'Profile Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function StoreBio(Request $request)
    {
        User::find(Auth::id())->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);
        TeacherProfile::where('user_id', Auth::id())->update([
            'bio' => $request->bio,
        ]);

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
    }
}
