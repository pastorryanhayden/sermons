<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Speaker;

class PublicSpeakersController extends Controller
{
    public function index(Church $church, $type, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $speakers = $church->speakers()->paginate(15);
        $pastor = $church->speakers()->where('position', 'Pastor')->get();
        $referer = $request->headers->get('referer');
        return response()->view('public.speakers.index', compact('church', 'speakers', 'pageType'))->header('X-FRAME-OPTIONS', "allow-from {$referer}");
    }
    public function show(Church $church, $type, Speaker $speaker, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $speaker->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->paginate(15);
        $referer = $request->headers->get('referer');
        return response()->view('public.speakers.single', compact('church', 'speaker', 'sermons', 'pageType'))->header('X-FRAME-OPTIONS', "allow-from {$referer}");
    }
}
