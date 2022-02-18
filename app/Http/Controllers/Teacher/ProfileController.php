<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Http\Requests\Student\ProfileRequest;
use App\Models\Teacher\Profile;
use App\Models\User;
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
        return view('teacher.profile.index');
    }
    public function edit(){
        $profile=User::with('teacherProfile')->where('id',Auth::id())->first();
        return view('teacher.profile.edit',compact('profile'));
    }
    public function update(ProfileRequest $request,$id){

        $studentProfile=$this->profileService->updateOrCreate($id,$request,'Teacher');

        if(json_decode($studentProfile->getcontent())->flag){
            dd('in');
        }else{
            dd('out');
        }
    }
}
