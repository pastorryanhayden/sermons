<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Speaker;

class PublicSpeakersController extends Controller
{
    public function index(Church $church, $type)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $speakers = $church->speakers()->paginate(15);
        $pastor = $church->speakers()->where('position', 'Pastor')->get();
        return view('public.speakers.index', compact('church', 'speakers', 'pageType'));
    }
    public function show(Church $church, $type, Speaker $speaker)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $speaker->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->paginate(15);
        return view('public.speakers.single', compact('church', 'speaker', 'sermons', 'pageType'));
    }
}
