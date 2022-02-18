<?php

use App\Http\Controllers\Admin\TeacherController;

Route::view('admin/login','auth.admin-login');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin'], 'as' => 'admin.'],function(){

    Route::view('dashboard','admin.index');

//teachers
    Route::resource('teachers', TeacherController::class);

    Route::group(['prefix' => 'teacher'], function (){
        Route::get('approved', [TeacherController::class, 'approvedTeachers'])->name('approved.teachers');
        Route::get('unapproved', [TeacherController::class, 'unApprovedTeachers'])->name('un.approved.teachers');
        Route::get('change-status/{id}/{status}', [TeacherController::class, 'changeStatus'])->name('change.status');
    });

});

