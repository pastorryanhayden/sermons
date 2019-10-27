<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Church;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'church_name' => ['required', 'string', 'max:255'],
            'church_url' => ['required', 'string', 'min:8'],
            'church_phone' => ['required', 'string', 'min:8'],
            'church_email' => ['required', 'string', 'min:8', 'max:255', 'email'],
            'address1' => ['required', 'string', 'min:8', 'max:255'],
            'address2' => ['nullable', 'string', 'min:8', 'max:255'],
            'state' => ['required', 'string', 'min:2', 'max:3'],
            'city' => ['required', 'string', 'min:2', 'max:255'],
            'zip' => ['required', 'string', 'min:2', 'max:12'],
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
        $church = Church::create([
            'name' => $data['church_name'],
            'url' => $data['church_url'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'phone' => $data['church_phone'],
            'email' => $data['church_email'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'church_id' => $church->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $church->admin_id = $user->id;
        $church->save();
        $church->settings()->create([
            'title' => 'Sermons',
            'subtitle' => "The Preaching Ministry of {$church->name}"
        ]);
        $church->podcast()->create([
            'podcast_title' => "{$church->name} Preaching Podcast",
            'podcast_description' => "Bible Sermons from {$church->name} in {$church->city}, {$church->state}."
        ]);
        return $user;
    }
}
