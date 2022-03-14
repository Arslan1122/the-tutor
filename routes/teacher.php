<?php

use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\TuitionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\TuitionScheduleController;

Route::group(['prefix'=>'teacher','middleware'=>['auth','teacher','verified'],'as'=>'teacher.'],function(){

    Route::get('/dashboard',[TeacherController::class, 'index'])->name('dashboard');

    Route::group(['prefix'=>'profile','as'=>'profile.'],function(){

        Route::get('/show',[ProfileController::class,'display'])->name('display');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[ProfileController::class,'update'])->name('update');
        Route::post('/store-bio',[ProfileController::class,'StoreBio'])->name('store');

    });

    Route::group(['prefix' => 'tuitions' ], function (){
        Route::get('/',[TuitionController::class, 'index'])->name('available.tuitions');
        Route::get('show/{id}', [TuitionController::class, 'show'])->name('tuition.show');
        Route::post('store/bid', [TuitionController::class, 'store'])->name('tuition.store');
        Route::get('bids', [TuitionController::class, 'bids'])->name('bids');
        Route::get('active', [TuitionController::class, 'myTuitions'])->name('my.tuitions');
        Route::get('completed', [TuitionController::class, 'completed'])->name('completed.tuitions');
    });

    Route::group(['prefix' => 'schedule'], function () {
        Route::get('/', [TuitionScheduleController::class, 'index'])->name('schedule.index');
        Route::get('create', [TuitionScheduleController::class, 'create'])->name('schedule.create');
        Route::post('store', [TuitionScheduleController::class, 'store'])->name('schedule.store');
        Route::get('delete/{id}', [TuitionScheduleController::class, 'destroy'])->name('schedule.delete');
    });

    Route::get('/package',[TeacherController::class,'package'])->name('package');

    Route::get('books', [TeacherController::class , 'books'])->name('all.books');

    Route::get('books/create', [TeacherController::class , 'createBook'])->name('books.create');

    Route::get('books/delete/{id}', [TeacherController::class , 'deleteBook'])->name('books.delete');

    Route::post('upload/book', [TeacherController::class,'uploadBook'])->name('upload.book');
});
