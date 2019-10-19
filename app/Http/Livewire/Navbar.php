<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    
    public $settingsOpen;
    public $space;
    public $userinitials;

    public function mount()
    {
        $this->switcherOpen = false;
        $this->settingsOpen = false;
        $user =  Auth::user();
        if ($user) {
            $username = $user->name;
            $usernamearray = explode(" ", $username);
            $firstInitial = substr($usernamearray[0], 0, 1);
            $lastInitial = $usernamearray[1] ? substr($usernamearray[1], 0, 1) : '';
            $this->userinitials = "{$firstInitial}{$lastInitial}";
        }
       
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
