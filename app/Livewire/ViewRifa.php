<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;
use Livewire\WithPagination;

class ViewRifa extends Component
{

    
    use WithPagination;

    public $listeners = ['confirmDelete' => 'deleteRifa'];


    public function deleteRifa($id)
    {
        Raffle::find($id)->delete();
        session()->flash('message', 'Rifa eliminada con éxito.');
        $this->resetPage(); // Refresca la lista después de eliminar
    }

    public function edit($id)
    {
        return redirect()->route('rifas.edit', ['rifa' => $id]);
    }

    public function render()
    {
        ; // Pagina los resultados, 10 por página
        return view('livewire.view-rifa', ['rifas' => Raffle::paginate(10)])->layout('layouts.app');
    }

}