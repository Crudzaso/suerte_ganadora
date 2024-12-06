<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class ViewRifa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $listeners = ['confirmDelete' => 'deleteRifa'];


    public function deleteRifa($id)
    {
        \Log::info('deleteRifa');
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
