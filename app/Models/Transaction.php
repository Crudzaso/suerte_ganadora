<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = [
        'user_id',
        'raffle_id',
        'ticket_id',
        'status',
        "transaction_date",
        'amount',
    ];
}
