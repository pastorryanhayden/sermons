<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sermon;
use App\Book;

class SermonsTextsController extends Controller
{
    public function edit(Request $request, $id)
    {
    	$sermon = Sermon::findOrFail($id);
    	$texts = $sermon->chapter()->get();
    	$books = Book::all();
    	$selected_book = $request->input('book') ? Book::find($request->input('book')) : null;
    	$chapters = $selected_book ? $selected_book->chapter()->get() : null; 
    	$chapid = $request->input('selectedchapter') ? $request->input('selectedchapter') : null;
    	$selected_chapter = $chapid ? $selected_book->chapter()->where('id', $chapid)->first() : null;
    	$verses = [];
    	if($selected_chapter)
    	{
		    for ($x = 1; $x <= $selected_chapter->verses; $x++) {
            $verses[] = $x;
        	}
	    	}
    
    	$selected_start_verse = $request->input('start') ? $request->input('start') : null;
    	$endverses = [];
    	if($selected_start_verse){
    		for ($x = $selected_start_verse; $x <= $selected_chapter->verses; $x++) {
           		 $endverses[] = $x;
        	}
    	}
    	

    	return view('sermons.texts', compact('sermon', 'chapters', 'texts', 'books', 'selected_book', 'verses', 'selected_start_verse', 'selected_chapter', 'endverses'));
    }
    /*
    	$id is for the sermon.  Other data:
    	"book" => "1"
      	"selected_chapter" => "2"
      	"start_verse" => "1"
      	"endverse" => "1"

    */

    public function store(Request $request, $id)
    {
    $sermon = Sermon::find($id);
    $sermon->chapter()->attach($request->input('selected_chapter'), ['verseStart' => $request->input('start_verse'), 'verseEnd' => $request->input('endverse'), ]);
    return redirect("/sermons/{$sermon->id}/text");
    	
    }
    public function destroy($id, $chapter)
    {
    	$sermon = Sermon::find($id);
    	$sermon->chapter()->detach($chapter);
    	return redirect("/sermons/{$sermon->id}/text");
    }
}
