<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class ViewRifa extends Component

{
    public $rifas;

    public function mount()
    {
        $this->rifas = Raffle::all();
    }

    public function deleteRifa($id)
    {
        Raffle::find($id)->delete();
        session()->flash('message', 'Rifa eliminada con éxito.');
        $this->rifas = Raffle::all(); // Refresca la lista
    }


    public function edit($id)
    {
        return redirect()->route('rifas.edit', ['rifa' => $id]);
    }

    public function render()
    {
        return view('livewire.view-rifa');
    }
}
