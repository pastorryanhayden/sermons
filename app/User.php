<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $connection = 'userbase';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'church_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
    public function initials()
    {
        $username = $this->name;
        $usernamearray = explode(" ", $username);
        $arraySize = sizeof($usernamearray);
        $firstInitial = substr($usernamearray[0], 0, 1);
        $lastInitial = null;
        if($arraySize > 1) 
        {
            $lastInitial = $usernamearray[1] ? substr($usernamearray[1], 0, 1) : '';
        }
       
        return "{$firstInitial}{$lastInitial}";
    }
    public function isAdmin()
    {
       return $this->church->admin_id == $this->id ? true : false ;
    }
    public function permissions()
    {
        return $this->hasOne(UserPermission::class);
    }
}
