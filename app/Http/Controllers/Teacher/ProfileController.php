<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function display(){
        return view('teacher.profile.index');
    }
    public function edit(){
        return view('teacher.profile.edit');
    }
}
