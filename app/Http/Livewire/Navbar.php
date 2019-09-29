<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    public $switcherOpen;
    public $settingsOpen;
    public $space;

    public function mount()
    {
        $this->switcherOpen = false;
        $this->settingsOpen = false;

        // Set the "space" for the navbar by checking the existence of keywords in the Route
        $uri = Route::current()->uri;
        if(strpos($uri, 'sermons') !==false)
        {
            $this->space = 'sermons';
        }
        elseif(strpos($uri, 'prayer') !== false)
        {
            $this->space = 'prayer';
        }
        else 
        {
            $this->space = 'home';
        }
    }
 
    // Toggle the applicaiton switcher
    public function toggleSwitcher()
    {
        $this->switcherOpen = !$this->switcherOpen;
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
