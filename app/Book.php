<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function sermons()
    {
        return $this->belongsToMany(Sermon::class);
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
