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
        $showSpeakers = $request->input('newSpeaker') == true ? true : false;
        $showSeries = $request->input('newSeries') == true ? true : false;
        $series = Series::where('church_id', $church->id)->get();
        $speakers = Speaker::where('church_id', $church->id)->get();

        return view('sermons.create', compact('series', 'speakers', 'showSpeakers', 'showSeries'));

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
         $church = $user->church;
         $sermon = $church->sermons()->create($validated);
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
    public function edit($id)
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
         $sermon = Sermon::find($id);
         $sermon->update($validated);

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
