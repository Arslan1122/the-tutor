<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects', function () {
    if(Auth::user()->is_admin)
    {
        return redirect('/admin/dashboard');
    }
    elseif(!Auth::user()->is_admin){

        if(Auth::user()->hasRole('teacher'))
        {
            if(Auth::user()->is_approved){
                return redirect('/teacher/dashboard');
            }
            return redirect('teacher/profile/edit');
        }

        elseif(Auth::user()->hasRole('student')){
            return redirect()->route('student.dashboard');
        }
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/student.php';
require __DIR__.'/teacher.php';
