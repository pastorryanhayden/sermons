<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $connection = 'userbase';
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    //
}
