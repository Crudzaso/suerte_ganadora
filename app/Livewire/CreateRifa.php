<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;
use GuzzleHttp\Client;

class CreateRifa extends Component
{


    public $title, $description, $start_date, $end_date, $status, $selectedLottery;
    public $lotteries = [];
    protected $allowedLotteries = [
        'ANTIOQUEÑITA MAÑANA',
        'ANTIOQUEÑITA TARDE',
        'PAISITA DIA',
        'PAISITA NOCHE',
        'ASTRO SOL',
        'ASTRO LUNA',
        'MEDELLIN',
        'BOGOTA',
    ];

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'selectedLottery' => 'required',
        ]);

        Raffle::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'Lottery_name' => $this->selectedLottery,
        ]);

        session()->flash('message', 'Rifa creada con éxito!');
        return redirect()->to('/rifas');
    }

    public function render()
    {
        return view('livewire.create-rifa')->layout('layouts.app');
    }

    //function to get lottery names
    public function getLotteries()
    {

        $client = new Client();

        try{
            //Method to fetch lotteries from API
            $response = $client->get('https://api-resultadosloterias.com/api/lotteries');
            //Condition to see if http method get was sucessfull
            if($response->getStatusCode()==200){
                //Method to decode json response onto an array
                $data = json_decode($response->getBody(), true);
                $lotteries = $data['data']??[];

                //Filtering
                $filteredLotteries = array_filter($lotteries, function($lottery){
                    //include used Lotteries
                    return in_array($lottery['name'], $this->allowedLotteries);
                });
                return array_values($filteredLotteries);
            }
            \Log::warning('API response not valid', $response->getBody());
            return [];
        }catch(\Exeption $e){
            \log::error('Error getting API information: ', $e->getMessage());
        }
    }

    //function to load the lotteries fetched
    public function loadLotteries()
    {
        $this->lotteries = $this->getLotteries();
    }

    //function to mout the lotteries to the front
    public function mount()
    {
        $this->loadLotteries();
    }
}
