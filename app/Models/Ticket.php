<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'buy_date',
        'ticket_number',
        'user_id',
        'raffle_id',
    ];
}
