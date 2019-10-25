<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
