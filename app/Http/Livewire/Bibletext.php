<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Book;
use App\Chapter;

class Bibletext extends Component
{
    protected $books;
    protected $chapters;
    protected $verses = null;
    protected $endverses = null;
    public $selected_book = null;
    public $text;
    public $selected_chapter = null;
    public $selected_start_verse = null;
    public $selected_end_verse = null;

    public function mount($thetext, $key)
    {
        $this->text = $thetext;
        $this->books = Book::all();
    }
    public function setChapters()
    {
        dd($this->text);
        $this->selected_book = $id;
        $this->chapters = Chapter::where('book_id', $id)->get();
    }
    public function setVerses($id)
    {
        $this->selected_chapter = $id;
        $chapter = Chapter::find($id);
        $this->verses = [];
        for ($x = 1; $x <= $chapter->verses; $x++) {
            $this->verses[] = $x;
        }
    }
    public function setStartVerse($verse)
    {
        $this->selected_start_verse = $verse;
        $this->selected_end_verse = $verse;
        $chapter = Chapter::find($this->selected_chapter);
        $this->endverses = [];
        $startingVerse = $verse;

        for ($x = $startingVerse; $x <= $chapter->verses; $x++) {
            $this->endverses[] = $x;
        }
    }
    public function setEndVerse($verse)
    {
        $this->selected_end_verse = $verse;
    }
    public function render()
    {
        return view('livewire.bibletext', [
            'books' => $this->books,
            'chapters' => $this->chapters,
            'verses' => $this->verses,
            'endverses' => $this->endverses,
        ]);
    }
}
