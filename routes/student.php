<?php

use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\TuitionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'student','middleware'=>['auth','student'],'as'=>'student.'],function(){

    Route::view('/dashboard','student.index')->name('dashboard');

    Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
        Route::get('/',[ProfileController::class,'display'])->name('display');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::post('/update/{id}/',[ProfileController::class,'update'])->name('update');
        Route::post('/store-bio',[ProfileController::class,'StoreBio'])->name('store');
    });

    Route::group(['prefix' => 'tuitions'], function () {
        Route::get('/' ,[TuitionController::class, 'index'])->name('tuitions.index');
        Route::post('/store' ,[TuitionController::class, 'store'])->name('tuitions.store');
        Route::get('/edit/{id}' ,[TuitionController::class, 'edit'])->name('tuitions.edit');
        Route::post('/update/{id}' ,[TuitionController::class, 'update'])->name('tuitions.update');
        Route::get('/delete/{id}' ,[TuitionController::class, 'destroy'])->name('tuitions.delete');
        Route::get('proposals/{id}', [TuitionController::class, 'proposals'])->name('tuitions.proposals');
        Route::get('active', [TuitionController::class, 'activeTuitions'])->name('active.tuitions');
        Route::get('active/detail/{id}', [TuitionController::class, 'activeTuitionDetail'])->name('active.tuitions.detail');
    });

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('hire/{id}', [TuitionController::class, 'hireTeacher'])->name('hire.teacher');
    });
});
