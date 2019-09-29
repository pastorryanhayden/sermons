<?php

namespace App\Http\Livewire;

use Livewire\Component;


class SermonAdd extends Component
{
    public $tab;
    public $title;
    public $date;
    public $service;
    public $feature;
    public $series_id;
    public $speaker_id;
    public $description;
    public $manuscript;
    public $texts = [];

    
    protected $listeners = [
        'chapters' => 'setChapters'
    ];
    
    
    public function mount()
    {
        $this->tab = 'details';
        $this->texts = [
            [ 
                'selected_book' => null,
                'selected_chapter' => null,
                'selected_start_verse' => null,
                'selected_end_verse' => null
             ]
            ];
    }
    public function setChapters($key, $id)
    {   
        dd($this->texts);
        $this->selected_book = $id;
        $this->chapters = Chapter::where('book_id', $id)->get();
    }
    public function setVerses($id)
    {
        $this->selected_chapter = $id;
        $chapter = Chapter::find($id);
        $this->verses = [];
        for($x = 1; $x <= $chapter->verses; $x++){
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
    public function save()
    {

    }

    public function render()
    {
        return view('livewire.sermon-add');
    }
}
