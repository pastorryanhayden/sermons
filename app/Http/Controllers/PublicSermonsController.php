<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use App\Church;
use App\Book;
use App\Chapter;
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
    public function index(Church $church, Request $request)
    {
        // Get a list of years
        $datesermons = $church->sermons()->get();
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
        $sermons = $church->sermons()->latest('date')->paginate(10);
        if ($selectedyear && $selectedyear != "All") {
            $sermons = $church->sermons()->whereYear('date', '=', date($selectedyear))->latest('date')->paginate(10);
            // Get all of the months where there are sermons
          
            $datesermons = $church->sermons()->whereYear('date', '=', date($selectedyear))->latest('date')->get();
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
            $sermons = $church->sermons()->whereYear('date', '=', date($selectedyear))->whereMonth('date', '=', date($selectedmonth))->latest('date')->paginate(10);
        }
        return view('public.sermons.date', compact('church', 'sermons', 'years', 'selectedyear', 'months', 'selectedmonth'));
    }
    public function indexScripture(Church $church, Request $request)
    {
       
        $sermons = $church->sermons()->latest('date')->paginate(10);
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
        return view('public.sermons.scripture', compact('church', 'sermons', 'books', 'selectedbook', 'chapters', 'selectedchapter'));
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
        return view('public.sermons.single', compact('church', 'sermon', 'video_type', 'video_id', 'relatedSermons'));
    }

    public function player(Church $church, Sermon $sermon)
    {
        return view('public.player', compact('church', 'sermon'));
    }
}
