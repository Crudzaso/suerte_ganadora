<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class EditRifa extends Component
{

    public $rifaId, $title, $description, $start_date, $end_date, $status;

    public function mount($rifa)
    {
        $rifa = Raffle::find($rifa);
        $this->rifaId = $rifa->id;
        $this->title = $rifa->title;
        $this->description = $rifa->description;
        $this->start_date = $rifa->start_date;
        $this->end_date = $rifa->end_date;
        $this->status = $rifa->status;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        $rifa = Raffle::find($this->rifaId);
        $rifa->update([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Rifa actualizada con éxito!');
        return redirect()->to('/rifas');
    }


    public function render()
    {
        return view('livewire.edit-rifa')->layout('layouts.app');
    }
}
