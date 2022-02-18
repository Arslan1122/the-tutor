<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Standard;
use App\Models\Subject;
use App\Services\CrudService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPagesController extends Controller
{
    public function __construct(CrudService $crudService)
    {
        $this->crudService=$crudService;
    }

    public function coursesIndex(){
        $courses=Course::all();
        return view('admin.course.index',compact('courses'));
    }
    public function coursesInsert(Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->save($request,'Course');
        session()->flash('success','Course added');
        return redirect()->back();
    }
    public function courseUpdate($id,Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->update($id,$request,'Course');
        session()->flash('success','Category Updated');
        return redirect()->back();
    }
    public function courseDelete($id){

        $this->crudService->delete($id,'Course');
        session()->flash('success','Course Deleted');
        return redirect()->back();
    }

    public function standardIndex(){
        $standards=Standard::all();
        return view('admin.standard.index',compact('standards'));
    }
    public function  standardInsert(Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->save($request,'Standard');
        session()->flash('success','Standard Added');
        return redirect()->back();
    }
    public function standardUpdate($id,Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->update($id,$request,'Standard');
        session()->flash('success','Standard Updated');
        return redirect()->back();
    }
    public function standardDelete($id){

        $this->crudService->delete($id,'Standard');
        session()->flash('success','Standard Deleted');
        return redirect()->back();
    }

    public function subjectIndex(){
        $subjects=Subject::all();
        return view('admin.subject.index',compact('subjects'));
    }
    public function  subjectInsert(Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->save($request,'Subject');
        session()->flash('success','Subject Added');
        return redirect()->back();
    }
    public function subjectUpdate($id,Request $request){

        $this->validate($request,[
            'name'=>'required|max:196'
        ]);

        $this->crudService->update($id,$request,'Subject');
        session()->flash('success','Subject Updated');
        return redirect()->back();
    }
    public function subjectDelete($id){

        $this->crudService->delete($id,'Subject');
        session()->flash('success','Subject Deleted');
        return redirect()->back();
    }
}
