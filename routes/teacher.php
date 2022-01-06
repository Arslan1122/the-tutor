<?php
Route::group(['prefix'=>'teacher','middleware'=>['auth','teacher']],function(){

    Route::view('/dashboard','teacher.index');
});
