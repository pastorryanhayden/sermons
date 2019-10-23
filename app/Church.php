<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Church extends Model
{
    use Searchable;
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
    public function podcast()
    {
        return $this->hasOne(ChurchPodcast::class);
    }
    public function currentSeries()
    {
        $recent =  date("Y-m-d", strtotime(" -2 months"));
        return $this->series()->where('title', '!=', 'No Series')->whereHas('sermons', function (Builder $query) use ($recent) {
            $query->where('date', '>', $recent);
        })->limit(3)->get();
    }
}
