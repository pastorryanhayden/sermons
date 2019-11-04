<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function church()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.index', compact('church', 'user'));
    }

    public function churchchange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'name' => 'required | min:6',
            'url' => 'required | url',
            'phone' => 'nullable | min:10',
            'email' => 'required ',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);
        $church->update($validatedData);
        return redirect('/settings');
    }
    public function homepage()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.homepage', compact('church', 'user'));
    }

    public function homepagechange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'title' => 'required | min:6',
            'subtitle' => 'required | min:6',
            'header_photo' => 'nullable | url',
        ]);
        $church->settings()->update($validatedData);
        return redirect('/settings/homepage');
    }

    public function user()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.user', compact('church', 'user'));
    }
   
    public function userchange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'name' => 'nullable | min:6',
            'currentpassword' => 'nullable',
            'newpassword' => 'nullable',
            'confirm' => 'nullable | same:newpassword'
        ]);
        if ($request->name) {
            $user->name = $request->name;
            $user->save();
        }

        if ($request->currentpassword && !Hash::check($request->currentpassword, $user->password)) {
            return redirect('/settings/user')->with('status', "Your passwords don't match");
        }
        if ($request->currentpassword && Hash::check($request->currentpassword, $user->password) && $request->newpassword && $request->newpassword == $request->confirm) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
        }

        return redirect('/settings/user');
    }
    public function podcast()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.podcast', compact('church', 'user'));
    }

    public function podcastchange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'podcast_title' => 'required | min:6',
            'podcast_description' => 'required | min:10',
            'photo_url' => 'nullable | url',
           
        ]);
        $church->podcast->update($validatedData);
        return redirect('/settings/podcast');
    }
    public function removePodcastImage()
    {
        $user = Auth::user();
        $church = $user->church;
        $church->podcast->photo_url = null;
        $church->podcast->save();
        return redirect('/settings/podcast');
    }
    public function removeHomePageImage()
    {
        $user = Auth::user();
        $church = $user->church;
        $church->settings->header_photo = null;
        $church->settings->save();
        return redirect('/settings/homepage');
    }
    
}
