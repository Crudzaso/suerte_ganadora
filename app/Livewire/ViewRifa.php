<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;
use Livewire\WithPagination;

class ViewRifa extends Component
{
    use WithPagination;

    protected $listeners = ['deleteRifa' => 'deleteRifa'];

    public $confirmingRaffleDeletion = false;

    public function deleteRifa($id)
{
    \Log::info("Eliminando rifa con ID: $id"); // Log para depuración
    $rifa = Rifa::find($id);
    if ($rifa) {
        $rifa->delete();
        session()->flash('message', 'Rifa eliminada exitosamente.');
    } else {
        session()->flash('error', 'Rifa no encontrada.');
    }
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

    public function confirmingRaffleDeletion($id)
    {
        $this->confirmingRaffleDeletion = $id;
    }

    public function deleteRaffle(Raffle $rifa)
    {
        \Log::info("Eliminando rifa con ID: $rifa->id"); // Log para depuración
        $rifa->delete();
        $this->confirmingRaffleDeletion = false;
        session()->flash('message', 'Rifa eliminada exitosamente.');
    }

}
