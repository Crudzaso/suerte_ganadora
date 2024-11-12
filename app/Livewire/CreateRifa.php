<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class CreateRifa extends Component
{


    public $title, $description, $start_date, $end_date, $status;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'status' => 'required|in:activo,inactivo',
    ];

    public function saveRifa()
    {
        $this->validate();

        Raffle::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rifa creada exitosamente.');
        return redirect()->route('rifa.index');
    }


   
    public function render()
    {
        return view('livewire.create-rifa');
    }
}
