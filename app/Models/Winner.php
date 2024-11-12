<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    //

    protected $fillable = [ 
        'raffle_id',
        'ticket_id',
        'user_id',
        'prize_id',
    ];

    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }
    
}
