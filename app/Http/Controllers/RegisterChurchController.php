<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    public function step1()
    {
        return view('register-step-1');
    }
    public function step1validate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | min:6',
            'email' => 'required | email',
            'password' => 'required | min:6 | confirmed',
            'terms' => 'accepted',
        ]);
        if(empty($request->session()->get('user'))){
            $user = new User();
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }else{
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }
        return redirect('/register-church/2');
    }
    public function step2(Request $request)
    {
        // dd($request->session());
        return view('register-step-2');
    }
    public function step2validate()
    {
        $validatedData = $request->validate([
            'name' => 'required | min:6',
            'email' => 'required | unique:email | email',
            'password' => 'required | min:6 | confirmed',
            'terms' => 'accepted',
        ]);
    }
}
