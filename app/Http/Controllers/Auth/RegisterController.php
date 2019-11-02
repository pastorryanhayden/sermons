<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Church;
use App\Mail\ChurchSignUp;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:userbase.users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted']
        ]);
    }

    /**
     * Create a new user and church instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Check to see if this user already exists in the system and redirect with a warning if they do
       
        //     $existingUser = User::where('email', $data['email'])->first();
        // dd($existingUser);
        // if($existingUser){
        //     return view('auth.register')->with('status', 'This user already exists in our system.  Try logging in or using a different email.');
        // }
    

        $church = Church::create([
            'name' => "Generic Church",
            'url' => "https://genericchurch.org",
            'address1' => "123 Church Street",
            'city' => "City",
            'state' => "ST",
            'zip' => "12345",
            'phone' => "(111) 111 - 1111",
            'email' => "info@genericchurch.org",
        ]);
        
        

        $user = User::create([
            'name' => $data['name'],
            'church_id' => $church->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $church->admin_id = $user->id;
        $church->save();
        $church->series()->create([
            'title' => 'No Series',
            'description' => 'A catch all series for sermons with no series.'
        ]);
        
        $church->settings()->create([
            'title' => 'Sermons',
            'subtitle' => "The Preaching Ministry of {$church->name}"
        ]);
        $church->podcast()->create([
            'podcast_title' => "{$church->name} Preaching Podcast",
            'podcast_description' => "Bible Sermons from {$church->name} in {$church->city}, {$church->state}."
        ]);
         Mail::to($user->email)->send(new ChurchSignUp());
        return $user;
    }
}
