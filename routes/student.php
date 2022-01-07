<?php

use App\Http\Controllers\Student\ProfileController;

Route::group(['prefix'=>'student','middleware'=>['auth','student'],'as'=>'student'],function(){

    Route::view('/dashboard','student.index');
    Route::group(['prefix'=>'profile','as'=>'profile'],function(){
        Route::get('/',[ProfileController::class,'display'])->name('display');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
    });
});
