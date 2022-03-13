<?php

use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TuitionController;
use Illuminate\Support\Facades\Route;

Route::view('admin/login','auth.admin-login');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin'], 'as' => 'admin.'],function(){

    Route::get('dashboard',[AdminPagesController::class, 'dashboard'])->name('dashboard');

    //teachers
    Route::resource('teachers', TeacherController::class);

    //students
    Route::resource('students', StudentController::class);

    Route::group(['prefix' => 'teacher'], function (){
        Route::get('approved', [TeacherController::class, 'approvedTeachers'])->name('approved.teachers');
        Route::get('blocked', [TeacherController::class, 'blockedTeachers'])->name('blocked.teachers');
        Route::get('unapproved', [TeacherController::class, 'unApprovedTeachers'])->name('un.approved.teachers');
        Route::get('change-status/{id}/{status}', [TeacherController::class, 'changeStatus'])->name('change.status');
        Route::get('change-block-status/{id}/{status}', [TeacherController::class, 'changeBlockStatus'])->name('change.block.status');
    });

    Route::group(['prefix' => 'student'], function (){
        Route::get('approved', [StudentController::class, 'approvedStudents'])->name('approved.students');
        Route::get('blocked', [StudentController::class, 'blockedStudents'])->name('blocked.students');
        Route::get('unapproved', [StudentController::class, 'unApprovedStudents'])->name('un.approved.students');
        Route::get('change-status/{id}/{status}', [StudentController::class, 'changeStatus'])->name('change.status');
        Route::get('change-block-status/{id}/{status}', [StudentController::class, 'changeBlockStatus'])->name('change.block.status');
    });

    //dashboards
//    Route::view('/dashboard','admin.index');

    //courses
    Route::get('/courses',[AdminPagesController::class,'coursesIndex'])->name('courses.index');
    Route::post('/course/insert',[AdminPagesController::class,'coursesInsert'])->name('course.insert');
    Route::post('/course/update/{id}',[AdminPagesController::class,'courseUpdate'])->name('course.update');
    Route::get('/course/delete/{id}',[AdminPagesController::class,'courseDelete'])->name('course.delete');

    //standards
    Route::get('/standards',[AdminPagesController::class,'standardIndex'])->name('standard.index');
    Route::post('/standard/insert',[AdminPagesController::class,'standardInsert'])->name('standard.insert');
    Route::post('/standard/update/{id}',[AdminPagesController::class,'standardUpdate'])->name('standard.update');
    Route::get('/standard/delete/{id}',[AdminPagesController::class,'standardDelete'])->name('standard.delete');

    //Subjects
    Route::get('/subjects',[AdminPagesController::class,'subjectIndex'])->name('subject.index');
    Route::post('/subject/insert',[AdminPagesController::class,'subjectInsert'])->name('subject.insert');
    Route::post('/subject/update/{id}',[AdminPagesController::class,'subjectUpdate'])->name('subject.update');
    Route::get('/subject/delete/{id}',[AdminPagesController::class,'subjectDelete'])->name('subject.delete');

    //Tuitions
    Route::group(['prefix' => 'tuitions'], function () {
        Route::get('/', [TuitionController::class, 'index'])->name('tuitions.index');
        Route::get('approve/{id}', [TuitionController::class, 'approve'])->name('tuition.approve');
        Route::get('unapprove/{id}', [TuitionController::class, 'unapprove'])->name('tuition.unapproved');
        Route::get('approved', [TuitionController::class, 'approvedTuitions'])->name('approved.tuitions');
        Route::get('unapproved', [TuitionController::class, 'UnApprovedTuitions'])->name('un.approved.tuitions');
        Route::get('show/{id}', [TuitionController::class, 'show'])->name('tuition.show');
        Route::get('proposals/{id}', [TuitionController::class, 'proposals'])->name('tuitions.proposals');
    });


});

