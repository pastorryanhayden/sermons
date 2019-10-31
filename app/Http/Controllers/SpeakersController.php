<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Speaker;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $positions = [
            'Senior Pastor',
            'Assistant Pastor',
            'Deacon',
            'Elder',
            'Guest Preacher',
            'Missionary',
            'Evangelist',
            'Lay Preacher'
    ];
    // public function __construct($positions)
    // {
    //     $this->positions = $positions;
    // }

    public function index()
    {
        $user = Auth::user();
        $church = $user->church;
        $speakers = $church->speakers()->paginate(15);
        return view('sermons.speakers.index', compact('speakers', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = $this->positions;
        $user = Auth::user();
        $church = $user->church;
        return view('sermons.speakers.create', compact('positions', 'user'));
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
        'name' => 'required|unique:speakers|max:255',
        'bio' => 'nullable',
        'thumbnail' => 'url | nullable',
        'position' => 'string | required '
         ]);

        $user = Auth::user();
        $church = $user->church;
        $speaker = $church->speakers()->create($validatedData);
        return redirect('/speakers');
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
        $speaker = Speaker::findOrFail($id);
            $user = Auth::user();
        $church = $user->church;
        $positions = $this->positions;
         return view('sermons.speakers.edit', compact('speaker', 'positions', 'user'));
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
        'name' => 'required|max:255',
        'bio' => 'nullable',
        'thumbnail' => 'url | nullable',
        'position' => 'string | required '
        ]);
        $speaker = Speaker::findOrFail($id);
        $speaker->update($validatedData);
        return redirect('/speakers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);
        $sermons = $speaker->sermons()->get();
        foreach($sermons as $sermon)
        {
            $sermon->delete();
        }
        Speaker::destroy($id);
        return redirect('/speakers');
    }
}
