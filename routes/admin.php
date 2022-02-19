<?php

use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AdminPagesController;
use Illuminate\Support\Facades\Route;

Route::view('admin/login','auth.admin-login');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin'], 'as' => 'admin.'],function(){

    Route::view('dashboard','admin.index');

    //teachers
    Route::resource('teachers', TeacherController::class);

    Route::group(['prefix' => 'teacher'], function (){
        Route::get('approved', [TeacherController::class, 'approvedTeachers'])->name('approved.teachers');
        Route::get('blocked', [TeacherController::class, 'blockedTeachers'])->name('blocked.teachers');
        Route::get('unapproved', [TeacherController::class, 'unApprovedTeachers'])->name('un.approved.teachers');
        Route::get('change-status/{id}/{status}', [TeacherController::class, 'changeStatus'])->name('change.status');
        Route::get('change-block-status/{id}/{status}', [TeacherController::class, 'changeBlockStatus'])->name('change.block.status');
    });

    Route::view('/dashboard','admin.index');

    Route::get('/courses',[AdminPagesController::class,'coursesIndex'])->name('courses.index');
    Route::post('/course/insert',[AdminPagesController::class,'coursesInsert'])->name('course.insert');
    Route::post('/course/update/{id}',[AdminPagesController::class,'courseUpdate'])->name('course.update');
    Route::get('/course/delete/{id}',[AdminPagesController::class,'courseDelete'])->name('course.delete');

    Route::get('/standards',[AdminPagesController::class,'standardIndex'])->name('standard.index');
    Route::post('/standard/insert',[AdminPagesController::class,'standardInsert'])->name('standard.insert');
    Route::post('/standard/update/{id}',[AdminPagesController::class,'standardUpdate'])->name('standard.update');
    Route::get('/standard/delete/{id}',[AdminPagesController::class,'standardDelete'])->name('standard.delete');

    Route::get('/subjects',[AdminPagesController::class,'subjectIndex'])->name('subject.index');
    Route::post('/subject/insert',[AdminPagesController::class,'subjectInsert'])->name('subject.insert');
    Route::post('/subject/update/{id}',[AdminPagesController::class,'subjectUpdate'])->name('subject.update');
    Route::get('/subject/delete/{id}',[AdminPagesController::class,'subjectDelete'])->name('subject.delete');


});

