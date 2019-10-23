<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;

class PodcastController extends Controller
{
    public function show(Church $church)
    {
        $recentDate = 'date';
        $sermons = $church->sermons()->where('mp3', '!=', 'null')->latest('date')->get();
        
        
        
        return response()->view('public.podcastfeed', compact('sermons', 'church', 'recentDate'))->header('Content-Type', 'text/xml');
    }
}
