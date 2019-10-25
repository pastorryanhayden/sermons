<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
