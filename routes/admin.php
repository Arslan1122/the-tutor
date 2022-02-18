<?php

use App\Http\Controllers\Admin\AdminPagesController;
use Illuminate\Support\Facades\Route;

Route::view('admin/login','auth.admin-login');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

    Route::view('/dashboard','admin.index');
    Route::get('/courses',[AdminPagesController::class,'coursesIndex']);
    Route::post('/course/insert',[AdminPagesController::class,'coursesInsert'])->name('course.insert');
    Route::post('/course/update/{id}',[AdminPagesController::class,'courseUpdate'])->name('course.update');
    Route::get('/course/delete/{id}',[AdminPagesController::class,'courseDelete'])->name('course.delete');

    Route::get('/standard',[AdminPagesController::class,'standardIndex']);
    Route::post('/standard/insert',[AdminPagesController::class,'standardInsert'])->name('standard.insert');
    Route::post('/standard/update/{id}',[AdminPagesController::class,'standardUpdate'])->name('standard.update');
    Route::get('/standard/delete/{id}',[AdminPagesController::class,'standardDelete'])->name('standard.delete');

    Route::get('/subject',[AdminPagesController::class,'subjectIndex']);
    Route::post('/subject/insert',[AdminPagesController::class,'subjectInsert'])->name('subject.insert');
    Route::post('/subject/update/{id}',[AdminPagesController::class,'subjectUpdate'])->name('subject.update');
    Route::get('/subject/delete/{id}',[AdminPagesController::class,'subjectDelete'])->name('subject.delete');


});
