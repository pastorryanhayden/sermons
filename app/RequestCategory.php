<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCategory extends Model
{
    protected $guarded = [];

    public function church()
    {
    	return $this->belongsToMany(Church::class);
    }
    public function user()
    {
    	return $this->belongsToMany(User::class);
    }
    public function requests()
    {
    	return $this->belongsToMany(Request::class);
    }

}
