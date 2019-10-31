<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Series;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $church = $user->church;
        $seriess = $church->series()->paginate(15);
        return view('sermons.series.index', compact('seriess', 'church', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('sermons.series.create', compact('church', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'photo' => 'url | nullable',
        'body' => 'nullable '
          ]);
          $user = Auth::user();
        $church = $user->church;
        $speaker = $church->series()->create($validatedData);
        return redirect('/series');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $series = Series::find($id);
            $user = Auth::user();
        $church = $user->church;
         return view('sermons.series.edit', compact('series', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'photo' => 'url | nullable',
        'body' => 'nullable '
            ]);
          $series = Series::find($id);
          $series->update($validatedData);
          return redirect('/series');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $church = $user->church;
        Series::destroy($id);
        // Create a "No Series" Series if none exists
        $noSeries = $church->series()->firstOrCreate(['title' => 'No Series']);
        $lostSermons = $church->sermons()->where('series_id', $id)->get();
        foreach($lostSermons as $sermon)
        {
            $sermon->series_id = $noSeries->id;
            $sermon->save();
        }
        return redirect('/series');
    }
}
