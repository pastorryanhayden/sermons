<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChurchStyles extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    public function church()
    {
        return $this->hasOne(Church::class);
    }
}
