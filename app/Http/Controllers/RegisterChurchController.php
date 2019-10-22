<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterChurchController extends Controller
{
    public function terms()
    {
        return view('terms');
    }
    public function register()
    {
        return view('auth.register');
    }
}
