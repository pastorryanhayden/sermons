<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $connection = 'userbase';
    protected $fillable = [
    'email', 'church_id', 'token', 'name'
    ];

}
