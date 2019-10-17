<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;
use App\Speaker;

class PublicSpeakersController extends Controller
{
    public function index(Church $church)
    {
        $speakers = $church->speakers()->paginate(15);
        $pastor = $church->speakers()->where('position', 'Pastor')->get();
        return view('public.speakers.index', compact('church', 'speakers'));
    }
    public function show(Church $church, Speaker $speaker)
    {
        $sermons = $speaker->sermons()->latest('date')->paginate(15);
        return view('public.speakers.single', compact('church', 'speaker', 'sermons'));
    }
}
