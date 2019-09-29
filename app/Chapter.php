<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = [];

    public function sermons()
    {
        return $this->belongsToMany(Sermon::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
