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
        'setText' => 'setText',
        'addItem' => 'addText',
        'removeItem' => 'removeText'
    ];
    
    
    public function mount()
    {
        $this->tab = 'details';
        $this->texts = [
            []
        ];
    }
    public function addText()
    {
        $this->texts[] = [];
    }
    
    public function removeText()
    {
        array_pop($this->texts);
    }

    public function setText($text, $key)
    {
        $this->texts[$key] = $text;
        array_pop($this->texts);
    }
    public function save()
    {
        dd($this->texts);
    }

    public function render()
    {
        return view('livewire.sermon-add');
    }
}
