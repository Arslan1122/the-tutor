<?php
Route::view('admin/login','auth.admin-login');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

    Route::view('dashboard','admin.index');
});
