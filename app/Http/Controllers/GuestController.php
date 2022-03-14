<?php

namespace App\Http\Controllers;

use App\Models\LibraryBook;
use App\Models\TuitionRating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuestController extends Controller
{
    public function welcome()
    {
        $teachers = User::whereHas("roles", function ($q) {
            $q->where("name", "teacher");
        })->limit(10)
            ->orderBy('id', 'desc')
            ->with(['teacherProfile','teacherRatings'])
            ->get();
        return view('welcome', compact('teachers'));
    }

    public function pricing()
    {
        return view('guest.pricing');
    }

    public function teacherProfile($id)
    {
        $user = User::with(['teacherProfile'])->where('id',$id)->first();
        $ratingCount = TuitionRating::where('teacher_id', $id)->pluck('rating')->toArray();
        return view('guest.teacher-profile',compact('user','ratingCount'));
    }

    public function library()
    {
        $books = LibraryBook::with('teacher')->paginate(20);
        return view('guest.library',compact('books'));
    }

    public function download($id)
    {
        $book = LibraryBook::find($id);
        return response()->download(public_path($book->book));
    }
}
