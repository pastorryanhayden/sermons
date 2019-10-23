<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Sermon extends Model
{
    protected $guarded = [];
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
}
