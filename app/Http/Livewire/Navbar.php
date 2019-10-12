<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    
    public $settingsOpen;
    public $space;

    public function mount()
    {
        $this->switcherOpen = false;
        $this->settingsOpen = false;

        // Set the "space" for the navbar by checking the existence of keywords in the Route
       
        $this->space = 'sermons';
    }
 
    
    public function toggleSettings()
    {
        $this->settingsOpen = !$this->settingsOpen;
    }
    
    public function render()
    {
        return view('livewire.navbar');
    }
}
