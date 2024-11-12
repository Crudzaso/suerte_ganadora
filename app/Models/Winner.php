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
}
