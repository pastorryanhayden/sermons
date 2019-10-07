<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
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
    public function requestCategories()
    {
    	return $this->belongsToMany(RequestCategory::class);
    }
}
