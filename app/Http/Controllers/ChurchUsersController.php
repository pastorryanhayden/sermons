<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Invite;
use App\User;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ChurchUsersController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();
        $church = $user->church;
        $churchusers = $church->users()->where('id', '!=', $church->admin_id)->get();
        return view('settings.manageusers', compact('church', 'user', 'churchusers'));
    }
    public function sendInvite(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;

        $validatedData = $request->validate([
            'name' => 'required | min:5 | max:40',
            'email' => 'required | unique:userbase.users,email',
        ]);

        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random(15);
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());
    
        //create a new invite record
        $invite = Invite::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'church_id' => $church->id,
            'token' => $token
        ]);
    
        // send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        $request->session()->flash('alert', "We've sent an invite to the email you provided.  We'll let you know via email when the user registers.");
        // redirect back where we came from
        return redirect()
            ->back();
    }
    public function updatePermissions(User $user, Request $request)
    {
        if($user->permissions->sermon_admin)
        {
            $user->permissions->update(['sermons_admin' => 0]);
        }
        else
        {
            $user->permissions->update(['sermons_admin' => 1]);
        }
        $request->session()->flash('permissionschanged', "We've updated that user's permissions.");
        return redirect()
            ->back();
    }
    public function destroy(User $user, Request $request)
    {
        $user->delete();
        $request->session()->flash('permissionschanged', "We've deleted the user.");
        return redirect()
            ->back();
    }
}
