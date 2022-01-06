<?php
Route::group(['prefix'=>'student','middleware'=>['auth','student']],function(){

    Route::view('/dashboard','student.index');
});
