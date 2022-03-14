<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\LibraryBook;
use App\Models\Tuition;
use App\Models\TuitionProposal;
use App\Models\UserCourse;
use App\Models\UserStandard;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function index()
    {
        $teacherStandard = UserStandard::where('user_id',Auth::id())->pluck('standard_id')->toArray();
        $teacherCourses = UserCourse::where('user_id',Auth::id())->pluck('course_id')->toArray();
        $teacherSubjects = UserSubject::where('user_id', Auth::id())->pluck('subject_id')->toArray();
        $Alltuitions = Tuition::where('is_approved', 1)->get();
        $tuitions= [];
        foreach ($Alltuitions as $tuition)
        {
            if(
                in_array($tuition->standard_id, $teacherStandard) ||
                in_array($tuition->course_id, $teacherCourses) ||
                in_array($tuition->subject_id , $teacherSubjects)
            ) {
                $tuitions[] = $tuition;
            }
        }

        $myTuitions = TuitionProposal::where('teacher_id',Auth::id())->where('is_accepted', 1)->where('is_completed', 0)->get();
        $completedTuitions = TuitionProposal::where('teacher_id',Auth::id())->where('is_accepted',1)
            ->where('is_completed', 1)->with('tuition')->get();
        $books = LibraryBook::where('teacher_id', Auth::id())->get();



        return view('teacher.index', compact('tuitions','myTuitions','completedTuitions', 'books'));
    }

    public function package()
    {

    }

    public function createBook()
    {
        return view('teacher.library.create');
    }

    public function books()
    {
        $books = LibraryBook::where('teacher_id', Auth::id())->get();
        return view('teacher.library.index', compact('books'));
    }

    public function uploadBook(Request $request)
    {
        $request->validate([
            'book' => 'required|mimes:pdf'
        ]);

        $book = $request->book;
        $newBook = time() . '.' . $book->getClientOriginalExtension();
        $path = '/uploads/library';
        $book->move(public_path($path) . '/', $newBook);
        $bookPath = $path . '/' . $newBook;

        $libraryBook = LibraryBook::create([
            'teacher_id' =>Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'book' => $bookPath
        ]);

        if($request->hasFile('image'))
        {
            $bookImg = $request->image;
            $coverName = time() . '.' . $bookImg->getClientOriginalExtension();
            $path = '/uploads/library/covers';
            $bookCover = Image::make($bookImg->getRealPath());
            $bookCover->save(public_path($path) . '/' . $coverName);
            $coverImg = $path . '/' . $coverName;

            $libraryBook->update([
                'image' => $coverImg
            ]);
        }

        return redirect()->route('teacher.all.books')->with('success', 'Book uploaded successfully !');


    }

    public function deleteBook($id)
    {
        LibraryBook::find($id)->delete();
        return redirect()->back()->with('success', 'Your book deleted from library successfully');
    }
}
