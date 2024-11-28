<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class CreateRifa extends Component
{


    public $title, $description, $start_date, $end_date, $status;

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        Raffle::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rifa creada con éxito!');
        return redirect()->to('/rifas');
    }




    public function render()
    {
        return view('livewire.create-rifa')->layout('layouts.app');
    }
}
