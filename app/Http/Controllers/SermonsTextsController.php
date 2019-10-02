<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sermon;

class SermonsTextsController extends Controller
{
    public function edit($id)
    {
    	$sermon = Sermon::find($id);
    	$texts = $sermon->chapter()->get();
    	return view('sermons.texts', compact('sermon', 'texts'));
    }
}
