<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmbedsController extends Controller
{
    public function index()
    {
         $user = Auth::user();
        $church = $user->church;
        return view('embeds.index', compact('user', 'church'));
    }
    public function full()
    {
         $user = Auth::user();
        $church = $user->church;
        $main = env('APP_URL');
        $code = "<iframe src='{$main}/churches/{$church->id }/embed' frameborder='0' style='width: 100%; height: 100%; min-height: 80vh;'></iframe>";
        return view('embeds.full', compact('user', 'church', 'code'));
    }
    public function widgets()
    {
         $user = Auth::user();
        $church = $user->church;
        $main = env('APP_URL');
         $code = "<iframe src='{$main}/sermon/{$church->id }/latest' frameborder='0' style='width: 100%; min-height: 230px;'></iframe>";
        return view('embeds.widgets', compact('user', 'church', 'code'));
    }
}
