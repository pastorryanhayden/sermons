<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChurchPodcast extends Model
{
    protected $guarded = [];
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
