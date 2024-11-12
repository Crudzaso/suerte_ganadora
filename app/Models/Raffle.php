<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];
}
