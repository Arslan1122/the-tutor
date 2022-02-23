<?php

use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\TuitionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'teacher','middleware'=>['auth','teacher'],'as'=>'teacher.'],function(){

    Route::view('/dashboard','teacher.index')->name('dashboard');

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
    });
});
