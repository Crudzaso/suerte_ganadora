<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class EditRifa extends Component
{


    public $rifaId;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $status;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'status' => 'required|in:activo,inactivo',
    ];

    public function mount($rifaId)
    {
        $rifa = Raffle::findOrFail($rifaId);
        $this->rifaId = $rifa->id;
        $this->title = $rifa->title;
        $this->description = $rifa->description;
        $this->start_date = $rifa->start_date;
        $this->end_date = $rifa->end_date;
        $this->status = $rifa->status;
    }

    public function updateRifa()
    {
        $this->validate();

        $rifa = Raffle::findOrFail($this->rifaId);
        $rifa->update([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rifa actualizada exitosamente.');
        return redirect()->route('rifa.index');
    }

    public function render()
    {
        return view('livewire.edit-rifa');
    }
}
