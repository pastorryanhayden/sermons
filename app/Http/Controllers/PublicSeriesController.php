<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Series;

class PublicSeriesController extends Controller
{
    public function index(Church $church, $type, , Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $seriess = $church->series()->paginate(15);
         $referer = $request->headers->get('referer');
        return response()->view('public.series.index', compact('seriess', 'church', 'pageType'))->header('X-FRAME-OPTIONS', "allow-from {$referer}");
    }
    public function show(Church $church, $type, Series $series, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $series->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->oldest('date')->paginate(15);
        $referer = $request->headers->get('referer');
        return response()->view('public.series.single', compact('series', 'church', 'sermons', 'pageType'))->header('X-FRAME-OPTIONS', "allow-from {$referer}");
    }
}
