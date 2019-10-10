<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Series;
use App\Speaker;
use App\Sermon;
use App\Http\Requests\NewSermonRequest;

class SermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('sermons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        if($church->speakers->count() < 1)
        {
            return redirect('/speakers');
        }
        elseif($church->series->count() < 1)
        {
            return redirect('/series');
        }else{

        $series = Series::where('church_id', $church->id)->get();
        $speakers = Speaker::where('church_id', $church->id)->get();

        return view('sermons.create', compact('series', 'speakers'));

        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewSermonRequest $request)
    {
         $validated = $request->validated();
         $user = Auth::user();
         $series = null;
         $speaker = null;
         $church = $user->church;
         if($request->input('newSeriesName'))
         {
            $series = new Series;
            $series->church_id = $church->id;
            $series->title = $request->input('newSeriesName');
            $series->save();
         }
         if($request->input('newSpeakerName'))
         {
            $speaker = new Speaker;
            $speaker->church_id = $church->id;
            $speaker->name = $request->input('newSpeakerName');
            $speaker->save();
         }
         $series_id = $series ? $series->id : $request->input('series_id');
         $speaker_id = $speaker ? $speaker->id : $request->input('speaker_id');
         
         $sermon = $church->sermons()->create([
            'title' => $request->input('title'),
            'featured' => $request->input('featured'),
            'date' => $request->input('date'),
            'service' => $request->input('service'),
            'series_id' => $series_id,
            'speaker_id' => $speaker_id,
            'description' => $request->input('description'),
         ]);
         return redirect("/sermons/{$sermon->id}/text" );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $sermon = Sermon::findOrFail($id);
        $user = Auth::user();
        $church = $user->church;
        $series = Series::where('church_id', $church->id)->get();
        $speakers = Speaker::where('church_id', $church->id)->get();
        return view('sermons.edit', compact('series', 'speakers', 'sermon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewSermonRequest $request, $id)
    {
        $validated = $request->validated();
         $user = Auth::user();
         $church = $user->church;
         $series = null;
         $speaker = null;
         if($request->input('newSeriesName'))
         {
            $series = new Series;
            $series->church_id = $church->id;
            $series->title = $request->input('newSeriesName');
            $series->save();
         }
         if($request->input('newSpeakerName'))
         {
            $speaker = new Speaker;
            $speaker->church_id = $church->id;
            $speaker->name = $request->input('newSpeakerName');
            $speaker->save();
         }
         $series_id = $series ? $series->id : $request->input('series_id');
         $speaker_id = $speaker ? $speaker->id : $request->input('speaker_id');
         $sermon = Sermon::find($id);
         $sermon->update([
            'title' => $request->input('title'),
            'featured' => $request->input('featured'),
            'date' => $request->input('date'),
            'service' => $request->input('service'),
            'series_id' => $series_id,
            'speaker_id' => $speaker_id,
            'description' => $request->input('description'),
         ]);

         return redirect("/sermons/{$sermon->id}/text" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
