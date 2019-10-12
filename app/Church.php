<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function sermons()
    {
    	return $this->hasMany(Sermon::class);
    }
    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
    public function series()
    {
        return $this->hasMany(Series::class);
    }
}
