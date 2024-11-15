<?php

namespace App\Livewire;

use Livewire\Component;

class HelpView extends Component
{
    public function render()
    {
        return view('livewire.help-view')->layout('layouts.app');
    }
}
