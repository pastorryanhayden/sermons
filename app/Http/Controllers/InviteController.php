<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use App\Church;
use App\User;
use App\Mail\Invitecompleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class InviteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showInvitedUserForm($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
        //if the invite doesn't exist do something more graceful than this
        abort(404);
        }
        $invite = Invite::where('token', $token)->first();
        // Show a signup form for that church
        $church = Church::find($invite->church_id);
        return view('auth.invite-form', compact('token', 'church', 'invite'));
    }

    public function acceptInvitedUser(Request $request, $token)
    {
        // Make sure this is actually an invited user using the token
        if (!$invite = Invite::where('token', $token)->first()) {
        //if the invite doesn't exist do something more graceful than this
        abort(404);
        }
        
        // Validate the user data
        $validatedData = $request->validate([
            'name' => 'required | min:5 | max:40',
            'email' => 'required | unique:userbase.users,email',
            'password' => 'required',
            'password_confirmation' => 'nullable | same:password'
        ]);

         // create the user with the details from the invite
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'church_id' => $invite->church_id,
            'password' => Hash::make($request->password)
            ]);

        $user->permissions()->create([
            'sermons_admin' => 1
        ]);

        // Email the admin to let the know the new user is created.
        Mail::to($user->church->admin->email)->send(new InviteCompleted($user));
        // delete the invite so it can't be used again
        $invite->delete();
        
        // Redirect the user to the login page.
        return redirect('/login');

        

    }
}
