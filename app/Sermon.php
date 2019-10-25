<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

class Sermon extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';
    use Searchable;
    
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
    public function book()
    {
        return $this->belongsToMany(Book::class);
    }
    public function chapter()
    {
        return $this->belongsToMany(Chapter::class)->withPivot('verseStart', 'verseEnd');
    }
    public function complete()
    {
        if ($this->mp3 || $this->video_url) {
            return true;
        } else {
            return false;
        }
    }
    // Easily get the date in this format 'Sat, 02 Jan 2016 16:00:00 PDT'
    public function podcastDate()
    {
        $date = new Carbon($this->date);
        return $date->toRfc7231String();
    }
}
