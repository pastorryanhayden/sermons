<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Sermon;
use App\Book;
use App\Chapter;

class Bibletext extends Component
{
    protected $books;
    protected $sermon;
    protected $chapters;
    protected $texts;
    protected $verses = null;
    protected $endverses = null;
    public $selected_book = null;
    public $text;
    public $itemindex;
    public $selected_chapter = null;
    public $selected_start_verse = null;
    public $selected_end_verse = null;

    public function mount($id)
    {
        $this->sermon = Sermon::find($id);
        $this->texts = Sermon::find($id)->chapter()->get();
        $this->books = Book::all();
    }
    public function setChapters($id)
    {
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
        $this->emit('setText', [
            'selected_book' => $this->selected_book,
            'selected_chapter' => $this->selected_chapter,
            'selected_start_verse' => $this->selected_start_verse,
            'selected_end_verse' => $this->selected_end_verse
         ]);
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
