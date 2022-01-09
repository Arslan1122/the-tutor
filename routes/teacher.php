<?php

use App\Http\Controllers\Teacher\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'teacher','middleware'=>['auth','teacher']],function(){

    Route::view('/dashboard','teacher.index');
    Route::group(['prefix'=>'profile','as'=>'profile'],function(){
        Route::get('/',[ProfileController::class,'display'])->name('display');
        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
    });
});
