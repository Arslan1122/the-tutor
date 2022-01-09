<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ProfileRequest;
use App\Models\Student\Profile;
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
        return view('student.profile.index');
    }
    public function edit(){
        $profile=Profile::where('user_id',Auth::id())->first();
        return view('student.profile.edit',compact('profile'));
    }
    public function update(ProfileRequest $request,$id){

        $studentProfile=$this->profileService->updateOrCreate($id,$request,'\Profile','Student');

       if(json_decode($studentProfile->getcontent())->flag){
           dd('in');
       }else{
           dd('out');
       }
    }
}
