<?php

namespace App\Http\Livewire;

use Livewire\Component;


class SermonAdd extends Component
{
    public $title;
    public $date;
    public $service;
    public $feature;
    public $series_id;
    public $speaker_id;
    public $description;
    public $texts = [];

    
    protected $listeners = [
        'setText' => 'setText',
        'addItem' => 'addText',
        'removeItem' => 'removeText'
    ];
    
    
    public function mount()
    {
        $this->series_id = 1;
        $this->service = "Sunday Morning";
        $this->speaker_id = 1;
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
    public function saveSermon()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|min:3',
            'date' => 'required|date',
            'service' => 'required|string',
            'feature' => 'boolean',
            'series_id' => 'required | integer',
            'speaker_id' => 'required | integer',
            'texts' => 'array | required | min:1',
            'description' => 'nullable | string'
        ]);


        dd($validatedData);
    }

    public function render()
    {
        return view('livewire.sermon-add');
    }
}
