<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class ViewRifa extends Component

{

    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $status;

    public function mount($rifaId)
    {
        $rifa = Raffle::findOrFail($rifaId);
        $this->title = $rifa->title;
        $this->description = $rifa->description;
        $this->start_date = $rifa->start_date;
        $this->end_date = $rifa->end_date;
        $this->status = $rifa->status;
    }

    public function render()
    {
        return view('livewire.view-rifa');
    }
}
