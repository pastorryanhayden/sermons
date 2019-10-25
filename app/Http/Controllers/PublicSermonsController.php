<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use App\Church;
use App\Book;
use App\Chapter;
use App\Speaker;
use App\Series;
use App\Sermon;

class PublicSermonsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(Church $church, $type)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $recents = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->limit(4)->get();
        $featureds = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->where('featured', 1)->limit(4)->get();
        $currentSeries = null;
        $currentSeries = $church->currentSeries();

        return view('public.home', compact('church', 'recents', 'featureds', 'currentSeries', 'pageType'));
    }
    public function index(Church $church, $type, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        // Get a list of years
        $datesermons = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->get();
        $years = [];

        foreach ($datesermons as $sermon) {
            $split = explode("-", $sermon->date);
            $years[] = $split[0];
        }
        $years = collect($years);
        $years = $years->unique()->sort()->reverse();
    
        $selectedyear = $request->year;
        $selectedmonth = $request->month;
        $months = [];
        $sermons = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->paginate(10);
        if ($selectedyear && $selectedyear != "All") {
            $sermons = $church->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->whereYear('date', '=', date($selectedyear))->latest('date')->paginate(10);
            // Get all of the months where there are sermons
          
            $datesermons = $church->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->whereYear('date', '=', date($selectedyear))->latest('date')->get();
            foreach ($datesermons as $sermon) {
                $split = explode("-", $sermon->date);
                $month = [
                    'number' => $split[1],
                    'name' => date("F", mktime(0, 0, 0, $split[1], 10))
                ];
                $months[] = $month;
            }
            $months = collect($months);
            $months = $months->unique()->sortBy('number');
        }
        if ($selectedmonth && $selectedmonth != "All") {
            $sermons = $church->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->whereYear('date', '=', date($selectedyear))->whereMonth('date', '=', date($selectedmonth))->latest('date')->paginate(10);
        }
        return view('public.sermons.date', compact('church', 'sermons', 'years', 'selectedyear', 'months', 'selectedmonth', 'pageType'));
    }
    public function indexScripture(Church $church, $type, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->paginate(10);
        $books = Book::whereHas('sermons', function (Builder $query) use ($church) {
            $query->where('church_id', '=', $church->id);
        })->get();
        $chapters = [];
        $selectedbook = $request->book;
        $selectedchapter = $request->chapter;
        if ($selectedbook && $selectedbook != 'All') {
             $sermons = Sermon::whereHas('book', function (Builder $query) use ($selectedbook) {
                    $query->where('book_id', '=', $selectedbook);
             })->paginate(10);
             $chapters = Chapter::where('book_id', $selectedbook)->whereHas('sermons', function (Builder $query) use ($church) {
                $query->where('church_id', '=', $church->id);
             })->get();
        }
        if ($selectedchapter && $selectedchapter != 'All') {
             $sermons = Sermon::whereHas('chapter', function (Builder $query) use ($selectedchapter) {
                    $query->where('chapter_id', '=', $selectedchapter);
             })->paginate(10);
        }
        return view('public.sermons.scripture', compact('church', 'sermons', 'books', 'selectedbook', 'chapters', 'selectedchapter', 'pageType'));
    }
    public function indexSpeakers(Church $church, $type, Request $request)
    {
        $pageType = $type == 'embed' ? 'embed' : 'normal';
        $sermons = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->paginate(10);
        $selectedspeaker = $request->speaker;
        $selectedtype = $request->type;
        $speakers = $church->speakers()->get();
        $speakertypes = [];
        foreach ($speakers as $speaker) {
            ;
            $speakertypes[] = $speaker->position;
        }
        $speakertypes = collect($speakertypes);
        $speakertypes = $speakertypes->unique();
        if ($selectedtype && $selectedtype != 'All') {
            $speakers = $church->speakers()->where('position', $selectedtype)->get();
        }
        if ($selectedspeaker && $selectedspeaker != "All") {
            $speaker = Speaker::find($selectedspeaker);
            $sermons = $speaker->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->latest('date')->paginate(10);
        }
        return view('public.sermons.speakers', compact('church', 'sermons', 'speakers', 'selectedspeaker', 'speakertypes', 'selectedtype', 'pageType'));
    }

    public function indexSeries(Church $church, $type, Request $request)
    {
            $pageType = $type == 'embed' ? 'embed' : 'normal';
            $sermons = $church->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->latest('date')->paginate(10);
            $selectedseries = $request->theseries;
            $series = $church->series()->get();

        if ($selectedseries && $selectedseries != "All") {
            $theseries = Series::find($selectedseries);
            $sermons = $theseries->sermons()->where(function ($query) {
                $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
            })->latest('date')->paginate(10);
        }
            return view('public.sermons.series', compact('church', 'sermons', 'series', 'selectedseries', 'pageType'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church, $type, Sermon $sermon)
    {
        //Increment the sermon views
        $sermon->views = $sermon->views + 1;
        $sermon->save();

        $pageType = $type == 'embed' ? 'embed' : 'normal';
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
        if ($sermon->mp3 && !Str::contains($sermon->mp3, 'http')) {
            $disk = Storage::disk('wasabi');
            $sermon->mp3 = $disk->url($sermon->mp3);
        }
        $series = $sermon->series()->first();
        $relatedSermons = $series->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->where('id', '!=', $sermon->id)->latest('date')->limit(4)->get();
        return view('public.sermons.single', compact('church', 'sermon', 'video_type', 'video_id', 'relatedSermons', 'pageType'));
    }

    public function player(Sermon $sermon)
    {
        return view('public.player', compact('sermon'));
    }
    public function latest(Church $church)
    {
        $sermon = $church->sermons()->where(function ($query) {
            $query->where('mp3', '!=', null)->orWhere('video_url', '!=', null);
        })->latest('date')->first();
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
        if ($sermon->mp3 && !Str::contains($sermon->mp3, 'http')) {
            $disk = Storage::disk('wasabi');
            $sermon->mp3 = $disk->url($sermon->mp3);
        }
        $series = $sermon->series()->first();
     
        return view('public.latest', compact('sermon'));
    }
}
