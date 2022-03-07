<?php

use App\Http\Controllers\{FormController, RenderFormController};
use App\Http\Controllers\Common\ChatController;
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
})->name('/');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

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
            } else {
                return redirect('/teacher/profile/edit');
            }
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

Route::middleware('web')
    ->prefix(config('formbuilder.url_path', '/form-builder'))
    ->namespace('jazmy\FormBuilder\Controllers')
    ->name('formbuilder::')
    ->group(function () {
        Route::redirect('/', url(config('formbuilder.url_path', '/form-builder').'/forms'));

        /**
         * Public form url
         */
        Route::get('/form/{identifier}', [RenderFormController::class, 'render'])->name('form.render');
        Route::post('/form/{identifier}', [RenderFormController::class, 'submit'])->name('form.submit');
        Route::get('/form/{identifier}/feedback', [RenderFormController::class, 'feedback'])->name('form.feedback');

        /**
         * My submission routes
         */
        Route::resource('/my-submissions', 'MySubmissionController');

        /**
         * Form submission management routes
         */
        Route::name('forms.')
            ->prefix('/forms/{fid}')
            ->group(function () {
                Route::resource('/submissions', 'SubmissionController');
            });

        /**
         * Form management routes
         */
        Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
        Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');
        Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
        Route::get('/forms/{form}', [FormController::class, 'show'])->name('forms.show');
        Route::get('/forms/{form}/edit', [FormController::class, 'edit'])->name('forms.edit');
        Route::patch('/forms/{form}', [FormController::class, 'update'])->name('forms.update');
        Route::delete('/forms/{form}', [FormController::class, 'destroy'])->name('forms.destroy');
    });

Route::group(['middleware'=>'auth'],function(){
    Route::get('showchat',[ChatController::class,'show']);
    Route::get('/chatroom/{id}',[ChatController::class,'singleChatBox'])->name('chatroom.single');
    Route::post('/chatroom/sendMsg',[ChatController::class,'sendMessage'])->name('massage.send');
});
