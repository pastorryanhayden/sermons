<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Series;

class PublicSeriesController extends Controller
{
    public function index(Church $church, $type)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $seriess = $church->series()->paginate(15);
        return view('public.series.index', compact('seriess', 'church', 'pageType'));
    }
    public function show(Church $church, $type, Series $series)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $series->sermons()->oldest('date')->paginate(15);
        return view('public.series.single', compact('series', 'church', 'sermons', 'pageType'));
    }
}
