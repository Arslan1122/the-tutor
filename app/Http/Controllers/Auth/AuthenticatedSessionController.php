<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $user=DB::table('users')->where('id',Auth::user()->id);
        $url = str_replace(url('/'), '', url()->previous()) ;

        if($url=='/admin/login'){
            $user=$user->where('is_admin',1);

            if(!$user->exists()){
                $this->userNotFound($request);
            }
        }elseif($url=='/login'){
            $user=$user->where('is_admin',0);
            if(!$user->exists()){
                $this->userNotFound($request);
            }
        }
        else{
            $this->userNotFound($request);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function userNotFound($request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
}
