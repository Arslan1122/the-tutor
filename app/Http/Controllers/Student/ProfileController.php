<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function display(){
        return view('student.profile.index');
    }
    public function edit(){
        return view('student.profile.edit');
    }
}
