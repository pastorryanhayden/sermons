<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Church;
use App\Sermon;

class PublicSermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(Church $church)
    {

        $recents = $church->sermons()->latest('date')->limit(4)->get();
        $featureds = $church->sermons()->latest('date')->where('featured', 1)->limit(4)->get();
        $currentSeries = null;
        $currentSeries = $church->currentSeries();

        return view('public.home', compact('church', 'recents', 'featureds', 'currentSeries'));
    }
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church, Sermon $sermon)
    {
        $video_id = null;
        $video_type = null;
        if ($sermon->video_url) {
            if (Str::contains($sermon->video_url, 'youtube')) {
            // Get the youtube id for the embed
                parse_str(parse_url($sermon->video_url, PHP_URL_QUERY), $my_array_of_vars);
                $video_type = 'youtube';
                $video_id = $my_array_of_vars['v'];
                // dd($video_id);
            } elseif (Str::contains($sermon->video_url, 'vimeo')) {
                $path = parse_url($sermon->video_url, PHP_URL_PATH);
                $path = Str::replaceFirst('/', '', $path);
                $video_type = 'vimeo';
                $video_id = $path;
            }
        }
        $series = $sermon->series()->first();
        $relatedSermons = $series->sermons()->where('id', '!=', $sermon->id)->latest('date')->limit(4)->get();
        return view('public.sermon', compact('church', 'sermon', 'video_type', 'video_id', 'relatedSermons'));
    }

    public function player(Church $church, Sermon $sermon)
    {
        return view('public.player', compact('church', 'sermon'));
    }
}
