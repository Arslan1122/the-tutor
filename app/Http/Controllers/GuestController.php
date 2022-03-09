<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function pricing()
    {
        return view('guest.pricing');
    }
}
